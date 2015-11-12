<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Credit;
use App\Models\CreditRate;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Helpers\AccountHelper;
use App\Models\Account;
use App\Models\Contract;
use Carbon\Carbon;
use DB;
use Session;

class OpenCredit extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $user_id;
    /**
     * @var
     */
    private $credit_type_id;
    /**
     * @var
     */
    private $credit_rate_id;
    /**
     * @var
     */
    private $date_start;
    /**
     * @var
     */
    private $amount;

    private $user_chart_id = 2400;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $credit_type_id, $credit_rate_id, $date_start, $amount)
    {
        $this->user_id = $user_id;
        $this->credit_type_id = $credit_type_id;
        $this->credit_rate_id = $credit_rate_id;
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
        $creditRate = CreditRate::where(['id' => $this->credit_rate_id, 'type_id' => $this->credit_type_id])->first();
        $creditCurrencyCode = $creditRate->currency_code;

        DB::transaction(function () use($creditRate, $creditCurrencyCode, $accountHelper) {
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
                    'currency_code' => $creditCurrencyCode
                ]);
            }

            // Open(create) credit
            $credit = Credit::create([
                'user_id' => $this->user_id,
                'rate_id' => $this->credit_rate_id,
                'type_id' => $this->credit_type_id,
                'contract_id' => $contract->id,
                'currency_code' => $creditCurrencyCode,
                'date_start' => $this->date_start,
                'date_expiration' => '',
                'contract_term' => $creditRate->term,
                'amount' => $this->amount
            ]);

            // Link credit and accounts
            $credit->accounts()->attach($accounts[1]->id);
            $credit->accounts()->attach($accounts[2]->id);

            // ##### Accounting entry #####
            $account_chart_1010 = Account::chart1010()->first();
            $account_chart_7327 = Account::chart7327()->first();
            $account_user = $accounts[1];

            // 1. Give credit by bank
            $account_chart_7327->debit -= $this->amount;
            $account_chart_7327->save();

            $account_user->debit += $this->amount;
            $account_user->save();

            // 2. Translation of the credit into cash
            $account_user->credit -= $this->amount;
            $account_user->save();

            $account_chart_1010->debit += $this->amount;
            $account_chart_1010->credit -= $this->amount;
            $account_chart_1010->save();

            Session::flash('transanction_info', [
                'Из счёта фонда развития банка ( счёт № '.$account_chart_7327->id.' )  переведено '. number_format($this->amount,2).' (' . $credit->currency_code . ') на счёт клиента ( счёт № '.$account_user->id.' )',
                'Со счёта клиента ( счёт № '.$account_user->id.' )  переведено '. number_format($this->amount,2).' (' . $credit->currency_code . ') на счёт кассы банка ( счёт № '.$account_chart_1010->id.' )'
            ]);

        });

    }

}
