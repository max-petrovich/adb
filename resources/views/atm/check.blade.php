<table class="table table-striped">
    <tr>
        <td class="text-center">
            <h3>ЧЕК</h3>
        </td>
    </tr>
    <tr>
        <td>
            Petrovich's Bankas
        </td>
    </tr>
    <tr>
        <td>
            <b>{{ Request::input('operation') }}</b>
        </td>
    </tr>
    <tr>
        <td>
            {{ Request::input('info') }}
        </td>
    </tr>
    <tr>
        <td>
            Время операции: {{ Carbon\Carbon::now() }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            <a href="">Распечатать чек</a>
        </td>
    </tr>

</table>