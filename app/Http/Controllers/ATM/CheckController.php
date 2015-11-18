<?php

namespace App\Http\Controllers\ATM;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckController extends Controller
{

    public function index()
    {

        return view('atm.check');
    }
}
