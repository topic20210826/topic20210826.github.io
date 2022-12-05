@extends('layout.main')

@section('title', $title)

@section('content')
    <div class="py-5 py-lg-4 py-md-3">
        <div class="content">
            <div class="manage_content">
                <table border="2" cellpadding="5" class="table">
                    @foreach ($TransactionPaginate as $Transaction)
                        <tr>
                            <td align="center" colspan="2" class="user-top">
                                <a class="order-buttom" href="/buy_delete/{{ $Transaction->id }}">刪除</a>
                                <a class="order-buttom" href="/check/{{ $Transaction->id }}">確認</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="user-table">
                                飲料名稱：
                                @if ($Transaction->size == 'B')
                                    {{ $Transaction->merchandise_name }} (大)
                                @else
                                    {{ $Transaction->merchandise_name }} (小)
                                @endif
                            </td>
                            <td class="user-table">
                                數量*價錢：
                                {{ $Transaction->count }}*{{ $Transaction->price }}
                            </td>
                        </tr>
                        <tr>
                            <td class="user-table">
                                甜度/冰量：
                                @if ($Transaction->sweet == 'F')
                                    正常糖/
                                @elseif ($Transaction->sweet == 'S')
                                    少糖/
                                @elseif ($Transaction->sweet == 'H')
                                    半糖/
                                @elseif ($Transaction->sweet == 'M')
                                    微糖/
                                @else
                                    無糖/
                                @endif
                                @if ($Transaction->ice == 'F')
                                    正常冰
                                @elseif ($Transaction->ice == 'S')
                                    少冰
                                @elseif ($Transaction->ice == 'M')
                                    微冰
                                @else
                                    去冰
                                @endif
                            </td>
                            <td class="user-table">
                            </td>
                        </tr>
                        <tr>
                            <td class="user-top">
                                加料：
                                @if ($Transaction->tapioca == 'N' and
                                    $Transaction->red == 'N' and
                                    $Transaction->iu == 'N' and
                                    $Transaction->eigo == 'N')
                                    無加料
                                @endif
                                @if ($Transaction->tapioca == 'Y')
                                    珍珠
                                @endif
                                @if ($Transaction->red == 'Y')
                                    紅豆
                                @endif
                                @if ($Transaction->iu == 'Y')
                                    愛玉
                                @endif
                                @if ($Transaction->eigo == 'Y')
                                    椰果
                                @endif
                            </td>
                            <td class="user-top">
                                使用優惠券：
                                <select name="name" class="select_cup">
                                    @foreach ($ticketPaginate as $ticket)
                                        @if ($ticket->name == $Transaction->merchandise_name)
                                            @if ($ticket->type == 'V')
                                                <option value="{{ $ticket->id }}">
                                                    {{ $ticket->name }}/投票
                                                </option>
                                            @endif
                                            @if ($ticket->type == 'B')
                                                <option value="{{ $ticket->id }}">
                                                    {{ $ticket->name }}/團購
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        <tr>

                        </tr>
                        <tr>
                            <td align="center" colspan="2" class="user-buttom">建立時間：{{ $Transaction->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $TransactionPaginate->links() }}
            </div>
        </div>
    </div>
@endsection
