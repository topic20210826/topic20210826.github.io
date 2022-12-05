@extends('layout.master')

@section('title', $title)

@section('content')
    <div class="py-5 py-lg-4 py-md-3">
        <div class="content">
            <div class="manage_content">
                @include('components.validationErrorMessage')
                <table border="2" cellpadding="5" class="table table-bg2">
                    <tr>
                        <th>編號</th>
                        <th>名稱</th>
                        <th>狀態</th>
                        <th>分類</th>
                        <th>大杯價格</th>
                        <th>小杯價格</th>
                        <th>編輯</th>
                    </tr>
                    @foreach ($MerchandisePaginate as $Merchandise)
                        <tr>
                            <td>{{ $Merchandise->id }}</td>
                            <td>{{ $Merchandise->name }}</td>
                            <td>
                                @if ($Merchandise->status == 'C')
                                    編輯中
                                @else
                                    販售中
                                @endif
                            </td>
                            <td>
                                @if ($Merchandise->kind == 'O')
                                    原味純茶
                                @elseif ($Merchandise->kind == 'M')
                                    拿鐵鮮奶
                                @else
                                    手調風味
                                @endif
                            </td>
                            <td>{{ $Merchandise->big_price }}</td>
                            <td>{{ $Merchandise->small_price }}</td>
                            <td>
                                <a class="btn btn-success" href="/merchandise/{{ $Merchandise->id }}/edit">編輯</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $MerchandisePaginate->links() }}
            </div>
        </div>
    @endsection
