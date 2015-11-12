<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Account;
use App\Models\Contract;
use App\Models\Deposit;
use App\Models\DepositRate;
use Carbon\Carbon;
use DB;
use Session;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Helpers\AccountHelper;

class OpenDeposit extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $user_id;
    /**
     * @var
     */
    private $deposit_type_id;
    /**
     * @var
     */
    private $deposit_rate_id;
    /**
     * @var
     */
    private $date_start;
    /**
     * @var
     */
    private $amount;

    private $user_chart_id = 3014;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $deposit_type_id, $deposit_rate_id, $date_start, $amount)
    {
        $this->user_id = $user_id;
        $this->deposit_type_id = $deposit_type_id;
        $this->deposit_rate_id = $deposit_rate_id;
        $this->date_start = $date_start;
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(AccountHelper $accountHelper)
    {
        $depositRate = DepositRate::where(['id' => $this->deposit_rate_id, 'type_id' => $this->deposit_type_id])->first();
        $depositCurrencyCode = $depositRate->currency_code;

        DB::transaction(function () use($depositRate, $depositCurrencyCode, $accountHelper) {
            // Create contract
            $contract = Contract::create(['user_id' => $this->user_id]);

            $accounts = [];
            // Create accounts
            foreach ([1,2] as $account_type_id) {
                $accounts[$account_type_id] = Account::create([
                    'id' => $accountHelper->generateAccountNumber($this->user_chart_id, $account_type_id, $contract->id),
                    'user_id' => $this->user_id,
                    'chart_id' => $this->user_chart_id,
                    'type_id' => $account_type_id,
                    'currency_code' => $depositCurrencyCode
                ]);
            }

            // Open(create) deposit
            $deposit = Deposit::create([
                'user_id' => $this->user_id,
                'rate_id' => $this->deposit_rate_id,
                'type_id' => $this->deposit_type_id,
                'contract_id' => $contract->id,
                'currency_code' => $depositCurrencyCode,
                'date_start' => $this->date_start,
                'date_expiration' => '',
                'contract_term' => $depositRate->term,
                'amount' => $this->amount
            ]);

            // Link deposit and accounts
            $deposit->accounts()->attach($accounts[1]->id);
            $deposit->accounts()->attach($accounts[2]->id);

            // ##### Accounting entry #####
            $account_chart_1010 = Account::chart1010()->first();
            $account_chart_7327 = Account::chart7327()->first();
            $account_user = $accounts[1];

            // 1. Adding money to the cashier
            $account_chart_1010->debit += $this->amount;
            $account_chart_1010->save();

            // 2. Transfer money to fund the current account
            $account_chart_1010->credit -= $this->amount;
            $account_chart_1010->save();

            $account_user->credit = $this->amount;
            $account_user->save();

            // 3. Using the money bank
            $account_user->debit -= $this->amount;
            $account_user->save();

            $account_chart_7327->credit += $this->amount;
            $account_chart_7327->save();

            Session::flash('transanction_info', [
                'В кассу банка ( счёт № '.$account_chart_1010->id.' ) поступило '. number_format($this->amount,2).' (' . $deposit->currency_code . ')',
                'Из кассы банка ( счёт '.$account_chart_1010->id.' ) было переведено '. number_format($this->amount,2).' (' . $deposit->currency_code . ') на счёт пользователя ( счёт № '.$account_user->id.' )',
                'Со счета пользователя ( счёт № '.$account_user->id.' ) было переведено '.number_format($this->amount,2).' (' . $deposit->currency_code .' на счёт фонда развития банка ( счёт № '.$account_chart_7327->id.' )'
            ]);

        });

    }


}
