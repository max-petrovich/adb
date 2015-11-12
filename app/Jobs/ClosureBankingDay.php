<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Account;
use App\Models\Credit;
use App\Models\Deposit;
use Illuminate\Contracts\Bus\SelfHandling;
use Session;

class ClosureBankingDay extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->closeDepositDay();
        $this->closeCreditDay();
    }

    private function closeDepositDay() {
        $deposits = Deposit::active()->get();

        if (!$deposits->isEmpty()) {
            $depositPercentsSum = 0;

            $depositsFlashMessages = [];

            // accrued interest
            foreach ($deposits as $deposit) {
                $percentAccount = $deposit->accounts()->percent()->first();
                $percentsSum = round($deposit->amount * $deposit->rate()->first()->interest_rate / 100 / 365);
                $percentAccount->credit += $percentsSum;

                $percentAccount->save();
                $depositsFlashMessages[$percentAccount->id] = $percentsSum;

                $depositPercentsSum += $percentsSum;
            }

            $account_7327 = Account::chart7327()->first();
            $account_7327->debit  -= $depositPercentsSum;
            $account_7327->save();

            Session::flash('deposit_percents_message', $depositsFlashMessages);
        }
    }

    private function closeCreditDay() {
        $credits = Credit::active()->get();

        // ПО МЕСЯЧНО!
        if (!$credits->isEmpty()) {
            // Начисление процентов по кредиту
            foreach ($credits as $credit) {
                $percentsSum = 0;
                $mainAccount = $credit->accounts()->main()->first();
                $percentsAccount = $credit->accounts()->percent()->first();

                // Annuitet
                if ($credit->type_id == 1) {
                    $percentsSum = $credit->amount / 12 * $credit->rate()->first()->interest_rate / 100  * ($credit->contract_term + 1) / 2 / $credit->contract_term;
                } else {
                    $percentsSum = ($mainAccount->balances  == 0 ? $mainAccount->debit : (abs($mainAccount->credit) - $mainAccount->balances) ) * $credit->rate()->first()->interest_rate / 100 / 12;
                }

                $percentsSum = round($percentsSum);

                $creditFlashMessages[$percentsAccount->id] = $percentsSum;

                $percentsAccount->credit -= $percentsSum;
                $percentsAccount->save();

            // Внесение процентов по кредиту в кассу
                $account_1010 = Account::chart1010()->first();
                $account_1010->debit += $percentsSum;
                $account_1010->save();

                $account_1010->credit -= $percentsSum;
                $account_1010->save();

                $percentsAccount->debit += $percentsSum;
                $percentsAccount->save();

            // Внесение (погашение) кредита ежемесячно
                $sumToPayCredit = round($credit->amount / $credit->contract_term);

                $account_7327 = Account::chart7327()->first();
                $account_7327->debit += $sumToPayCredit;
                $account_7327->save();

                $account_7327->credit -= $sumToPayCredit;
                $account_7327->save();

                $mainAccount->debit += $sumToPayCredit;
                $mainAccount->save();


            // Высчет баланса на основном счету
                $mainAccount->balances = $mainAccount->debit + $mainAccount->credit;
                $mainAccount->save();

                Session::flash('credit_percents_message', $creditFlashMessages);
            }

        }
    }
}
