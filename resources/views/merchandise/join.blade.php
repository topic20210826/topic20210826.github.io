@extends('layout.main')

@section('title', $title)

@section('content')
    <button id="join_btn" onclick="location.href='/create_join/createjoin'">
        <img src="/img/create_join.png" alt="創立團購" style="height:140px;" aria-hidden="true">
    </button>
    <section class="w3l-mobile-content-7 vote_title_name">
        <div class="vote_title">
            <h4><i class="fas fa-leaf"></i>揪團揪起來!!如果揪團成功可以拿到折價卷喔!!</h4>
        </div>
        <input type="hidden" name="status" value='I' />
        @foreach ($joinPaginate as $join)
                <form action="/create_join/joincreate" method="post">
                    <div class="userdata-center">
                        <table border="2" cellpadding="5" class="table-bg2">
                            <tr>
                                <td class="join_first"></td>
                                <td class="join_name">團名:{{ $join->name }}</td>
                                <td class="join_time" align="right">
                                    <div data-countdown="{{ $join->arrived_data }}"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="join_first" align="left">品項名稱:{{ $join->merchandise }}</td>
                                <td class="join_center" align="center" rowspan="3"></td>
                                <td class="join_center" align="center" rowspan="3">
                                    <div id="num_btn_text">
                                        @if($join->people_number >= $join->price)
                                        <button class="color-1" disabled="disabled">
                                            已額滿
                                        </button>
                                        @else
                                        <button type="submit" class="submit color-1" name="id"
                                            value="{{ $join->id }}">
                                            跟團
                                        </button>
                                        @endif
                                    </div>
                                    {{ csrf_field() }}
                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                @if ($join->price == 30)
                                    <td class="join_first" align="left">折扣:9折</td>
                                @endif
                                @if ($join->price == 40)
                                    <td class="join_first" align="left">折扣:8折</td>
                                @endif
                                @if ($join->price == 50)
                                    <td class="join_first" align="left">折扣:7折</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="join_first"></td>
                                <td class="join_name">達成杯數:{{ $join->people_number }}杯</td>
                                <td class="join_time" align="right">目標杯數:{{ $join->price }}杯</td>
                            </tr>
                        </table>
                    </div>
                </form>
        @endforeach
    </section>
@endsection
</body>

</html>
