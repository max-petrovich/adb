<?php

namespace App\Helpers;


class AccountHelper
{
    public function generateAccountNumber($chart_id, $type_id, $contract_number) {
        $accountNumber = sprintf('%d%07d%d', $chart_id, $contract_number, $type_id);
        $accountNumber .= $this->getControlKeyToAccount($accountNumber);

        return $accountNumber;
    }

    private function getControlKeyToAccount($number) {
        return array_sum(str_split($number)) % 10;
    }
}