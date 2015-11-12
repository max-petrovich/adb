<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits_1 = Credit::where('type_id',1)->get();

        $chart_1 = [];

        foreach ($credits_1 as $credit) {
            $chart_1[] = [
                'credit' => $credit,
                'percents' => round($credit->amount / 12 * $credit->rate()->first()->interest_rate / 100  * ($credit->contract_term + 1) / 2 / $credit->contract_term)
            ];
        }

        $credits_2 = Credit::where('type_id',2)->get();

        $chart_2 = [];

        foreach ($credits_2 as $credit) {
            // Ежемесячный платёж
            $monthPay = $credit->amount / $credit->contract_term;
            // Сумма с каждым месяцем уменьшается
            $ostalos_deneg = $credit->amount;
            $chart_2[$credit->id] = [
                'credit' => $credit
            ];
            for ($month_i = 1; $month_i <= $credit->contract_term; $month_i++) {
                $chart_2[$credit->id]['percents'][$month_i] = $ostalos_deneg * $credit->rate()->first()->interest_rate / 100 / $credit->contract_term;
                $ostalos_deneg -= $monthPay;
            }
        }

        return view('credit_chart.index',compact('chart_1', 'chart_2'));
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
    public function store(Request $request)
    {
        //
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
