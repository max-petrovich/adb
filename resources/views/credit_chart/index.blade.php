@extends ('layouts.default')
@section('page_heading','График начисления процентов')
@section('section')

    @if (count($chart_1))
        <h3 class="text-center">Проценты по аннуитетному кредиту</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Кредит</th>
                <th>Проценты</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chart_1 as $chart_item)
                <tr>
                    <td><a href="{{ route('credit.show', $chart_item['credit']->id) }}">{{ $chart_item['credit']->id }}. {{ $chart_item['credit']->rate->name }}</a></td>
                    <td>{{ number_format($chart_item['percents'], 2) }} (BYR)</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if (count($chart_2))
        <h3 class="text-center">Проценты по стандартному кредиту</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Кредит</th>
                <th>Ежемесячный платёж</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chart_2 as $chart_item)
               <tr>
                   <td><a href="{{ route('credit.show', $chart_item['credit']->id) }}">{{ $chart_item['credit']->id }}. {{ $chart_item['credit']->rate->name }}</a></td>
                   <td>
                       <table>
                           <thead>
                           <tr>
                               <th>Номер месяца</th>
                               <th>Ежемесячный платёж</th>
                               <th>Проценты в указанный месяц</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($chart_item['percents'] as $month_i => $percent)
                           <tr>
                                <td>{{ $month_i }}</td>
                                <td>{{ number_format($chart_item['credit']->amount / $chart_item['credit']['contract_term'], 2) }} (BYR)</td>
                                <td>{{ number_format($percent, 2) }} (BYR)</td>
                           </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </td>
               </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@stop
