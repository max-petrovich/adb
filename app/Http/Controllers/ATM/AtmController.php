<?php

namespace App\Http\Controllers\ATM;

use App\Http\Controllers\Controller;
use Auth;

class AtmController extends Controller
{

    public function getIndex() {
        $menu = [
            [
                'action' => 'ATM\AtmController@getStateAccount',
                'title' => 'Текущее состояние счёта'
            ],
            [
                'action' => 'ATM\WithdrawController@index',
                'title' => 'Снять деньги со счёта'
            ],
            [
                'action' => 'ATM\PaymentController@index',
                'title' => 'Осуществить платёж'
            ],
            [
                'action' => 'Auth\AuthController@getLogout',
                'title' => 'Забрать карту',
                'btn-status' => 'danger'
            ]
        ];
        return view('atm.index', compact('menu'));
    }

    public function getStateAccount() {
        $account = Auth::user()->account;
        return view('atm.stateAccount', compact('account'));
    }

    public function getPayment() {

    }
}