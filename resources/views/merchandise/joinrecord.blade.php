@extends('layout.users')

@section('title', $title)

@section('content')
    <div class="transaction-right">
        <table border="2" cellpadding="5" class="table">
            @foreach ($joinPaginate as $join)
                <tr>
                    <td class="user-table">
                        團名:{{ $join->name }}
                    </td>
                    <td class="user-table">
                    </td>
                </tr>
                <tr>
                    <td class="user-top">
                        品項名稱:{{ $join->merchandise }}
                    </td>
                    <td class="user-top">
                        @if ($join->price == 30)
                            折扣:9折
                        @endif
                        @if ($join->price == 40)
                            折扣:8折
                        @endif
                        @if ($join->price == 50)
                            折扣:7折
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="user-buttom">
                        達成杯數:{{ $join->people_number }}杯
                    </td>
                    <td class="user-buttom">
                        目標杯數:{{ $join->price }}杯
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $joinPaginate->links() }}
    </div>

@endsection
</body>

</html>
