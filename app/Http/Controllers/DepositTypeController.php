<?php

namespace App\Http\Controllers;

use App\Models\DepositRate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepositTypeController extends Controller
{

    public function index($type_id) {
        return DepositRate::where(['type_id'=> $type_id])->lists('name', 'id');
    }

}
