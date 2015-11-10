<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\Account;
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

            // \Deposits
        }

    }
}
