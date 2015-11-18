<?php

namespace App\Http\Controllers\ATM;

use App\Http\Requests\WithdrawRequest;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('atm.withdraw');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WithdrawRequest $request)
    {
        $account = Auth::user()->account;

        $sum = $request->input('sum');

        // Check available sum
        if ($account->debit < $sum) {
            return redirect()->route('atm.withdraw.index')->withErrors([
                'not_enough_money' => 'Недостаточно средств на счету'
            ]);
        } else {
            $account->debit -= $sum;
            $account->save();
        }


        return redirect()->route('atm.withdraw.index')->with([
            'flash_message' => 'Сумма '. number_format($sum, 2) . ' (BYR) успешно снята с вашего счёта!',
            'check-info' => 'Сумма: '. number_format($sum, 2) . ' (BYR), Остаток на счету: ' . number_format($account->debit, 2) . '(BYR)',
            'status' => 1
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
