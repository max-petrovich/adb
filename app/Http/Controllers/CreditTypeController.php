<?php

namespace App\Http\Controllers;

use App\Models\CreditRate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditTypeController extends Controller
{
    public function index($type_id) {
        return CreditRate::where(['type_id'=> $type_id])->lists('name', 'id');
    }
}
