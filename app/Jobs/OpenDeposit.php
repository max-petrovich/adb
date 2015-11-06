<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class OpenDeposit extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $user_id;
    /**
     * @var
     */
    private $contract_number;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contract_number, $user_id, $deposit_type_id, $deposit_rate_id, $date_start, $amount)
    {
        $this->user_id = $user_id;
        $this->contract_number = $contract_number;
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
    public function handle()
    {
    }
}
