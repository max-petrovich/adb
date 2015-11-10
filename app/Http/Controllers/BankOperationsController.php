<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BankOperationsController extends Controller
{

    public function getCloseDay(Request $request) {

        $this->dispatchFrom(\App\Jobs\ClosureBankingDay::class, $request);

        return view('bank-operations.close-day');
    }
}
