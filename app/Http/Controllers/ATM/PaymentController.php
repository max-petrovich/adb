<?php

namespace App\Http\Controllers\ATM;

use App\Http\Requests\StorePaymentRequest;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    protected $operators = ['velcom' => 'Velcom', 'mts' => 'МТС', 'life' => 'Life ;)'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('atm.payment')->with('operators', $this->operators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        $account = Auth::user()->account;

        $sum = $request->input('sum');

        // Check available sum
        if ($account->debit < $sum) {
            return redirect()->route('atm.payment.index')->withErrors([
                'not_enough_money' => 'Недостаточно средств на счету'
            ]);
        } else {
            $account->debit -= $sum;
            $account->save();
        }


        return redirect()->route('atm.payment.index')->with([
            'flash_message' => 'Сумма '. number_format($sum, 2) . ' (BYR) переведа на счёт оператора! ',
            'check-info' => 'Оператор: '.$this->operators[$request->input('operator')] . ', Номер телефона: '. $request->input('phone_number') .', Сумма: '. number_format($sum, 2) . ' (BYR), Остаток на счету: ' . number_format($account->debit, 2) . '(BYR)',
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
