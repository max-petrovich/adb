<?php

namespace App\Http\Controllers;

use App\Models\DepositRate;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepositRateController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DepositRate::findOrFail($id);
    }

}
