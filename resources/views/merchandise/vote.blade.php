@extends('layout.main')

@section('title', $title)

@section('content')
    <section class="w3l-mobile-content-7 py-6">
        <div class="vote_title">
            <h4><i class="fas fa-leaf"></i>每天投三票各類飲品只有一票，最高票我們會於這個月26號送折價券!!</h4>
        </div>
        <div class="w3l-menublock py-5">
            <div id="w3l-menublock" class="text-center py-lg-4 py-md-3">
                <input id="tab1" type="radio" name="kind" value="O" checked>
                <label class="tabtle" for="tab1">原味純茶</label>
                <input id="tab2" type="radio" name="kind" value="M">
                <label class="tabtle" for="tab2">拿鐵鮮奶</label>
                <input id="tab3" type="radio" name="kind" value="S">
                <label class="tabtle" for="tab3">手調風味</label>
                <section id="content1" class="tab-content text-left">
                    @php
                        $time = 0;
                    @endphp
                    <div class="vote-bot">
                        <div class="vote-title">
                            <h3>原味純茶</h3>
                        </div>
                        <div class="rows">
                            <div class="vote-wrap">
                                @foreach ($MerchandisePaginate as $Merchandise)
                                    @if ($time < 3)
                                        @php
                                            $time = $time + 1;
                                        @endphp
                                        @if ($time == 1)
                                            <div class="vote-first vote-item">
                                                <div class="vote-rank">本周第一</div>
                                                <div class="vote-pic">
                                                    <img src="/img/vote_tea1.png">
                                                </div>
                                            @elseif ($time == 2)
                                                <div class="vote-second vote-item">
                                                    <div class="vote-rank2">本周第二</div>
                                                    <div class="vote-pic">
                                                        <img src="/img/vote_tea2.png">
                                                    </div>
                                                @elseif ($time == 3)
                                                    <div class="vote-second vote-item">
                                                        <div class="vote-rank2">本周第三</div>
                                                        <div class="vote-pic">
                                                            <img src="/img/vote_tea3.png">
                                                        </div>
                                        @endif
                                        <div class="vote-txt">
                                            <div class="vote-name">{{ $Merchandise->name }}</div>
                                            <div class="vote-votes">
                                                <i class="fas fa-vote-yea"></i>總票數 |<div class="votes">
                                                    {{ $Merchandise->vote }}
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            @endif
                            @endforeach
                            <div class="vote-button">
                                <div id="listBtn" onclick="listBtn()">
                                    <h6>投票去</h6>
                                </div>
                            </div>
                        </div>
                        <div id="textlistn" style="display:none;">
                            <form action="/merchandise/votecheck" method="post">
                                <div class="votebox">
                                    <div class="voting">
                                        <div class="voting-txt">
                                            <div class="voting-title">
                                                <h2>本月飲品票選</h2>
                                                <p>點選您最喜歡的飲品並送出投票</p>
                                            </div>
                                            <div class="voting-btn">
                                                @foreach ($MerchandisePaginate as $Merchandise)
                                                    <div class="menu-list">
                                                        <div>
                                                            <div class="rows border-dot no-gutters drink_set">
                                                                <div class="button_content">
                                                                    <input type="radio" name="id"
                                                                        value="{{ $Merchandise->id }}"
                                                                        id="{{ $Merchandise->id }}">
                                                                </div>
                                                                <div class="col-12 menu-item-name">
                                                                    <h6>{{ $Merchandise->name }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="center">
                                                <div id="num_btn_text">
                                                    <button type="submit" class="submit color-1">
                                                        送出投票
                                                    </button>
                                                </div>
                                                {{ csrf_field() }}
                                            </div>
                                        </div>
                                        <div class="close" onclick="listBtn()">
                                            <i class="fas fa-times-circle closeBlock"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section id="content2" class="tab-content text-left">
                    @php
                        $time = 0;
                    @endphp
                    <div class="vote-bot">
                        <div class="vote-wrap">
                            <div class="vote-title">
                                <h3>拿鐵鮮奶</h3>
                            </div>
                            @foreach ($MerchandisePaginate2 as $Merchandise)
                                @if ($time < 3)
                                    @php
                                        $time = $time + 1;
                                    @endphp
                                    @if ($time == 1)
                                        <div class="vote-first vote-item">
                                            <div class="vote-rank">本周第一</div>
                                            <div class="vote-pic">
                                                <img src="/img/vote_tea1.png">
                                            </div>
                                        @elseif ($time == 2)
                                            <div class="vote-second vote-item">
                                                <div class="vote-rank2">本周第二</div>
                                                <div class="vote-pic">
                                                    <img src="/img/vote_tea2.png">
                                                </div>
                                            @elseif ($time == 3)
                                                <div class="vote-second vote-item">
                                                    <div class="vote-rank2">本周第三</div>
                                                    <div class="vote-pic">
                                                        <img src="/img/vote_tea3.png">
                                                    </div>
                                    @endif

                                    <div class="vote-txt">
                                        <div class="vote-name">{{ $Merchandise->name }}</div>
                                        <div class="vote-votes">
                                            <i class="fas fa-vote-yea"></i>總票數 |<div class="votes">{{ $Merchandise->vote }}
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote-button">
                            <div id="listBtn2" onclick="listBtn2()">
                                <h6>投票去</h6>
                            </div>
                        </div>
                    </div>
                    <div id="textlistn2" style="display:none;">
                        <form action="/merchandise/votecheck" method="post">
                            <div class="votebox">
                                <div class="voting">
                                    <div class="voting-txt">
                                        <div class="voting-title">
                                            <h2>本月飲品票選</h2>
                                            <p>點選您最喜歡的飲品並送出投票</p>
                                        </div>
                                        <div class="voting-btn">
                                            @foreach ($MerchandisePaginate2 as $Merchandise)
                                                <div class="menu-list">
                                                    <div>
                                                        <div class="rows border-dot no-gutters drink_set">
                                                            <div class="button_content">
                                                                <input type="radio" name="id"
                                                                    value="{{ $Merchandise->id }}"
                                                                    id="{{ $Merchandise->id }}">
                                                            </div>
                                                            <div class="col-12 menu-item-name">
                                                                <h6>{{ $Merchandise->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="center">
                                            <div id="num_btn_text">
                                                <button type="submit" class="submit color-1">
                                                    送出投票
                                                </button>
                                            </div>
                                            {{ csrf_field() }}
                                        </div>
                                    </div>
                                    <div class="close" onclick="listBtn2()">
                                        <i class="fas fa-times-circle closeBlock"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <section id="content3" class="tab-content text-left">
                    @php
                        $time = 0;
                    @endphp
                    <div class="vote-bot">
                        <div class="vote-wrap">
                            <div class="vote-title">
                                <h3>手調風味</h3>
                            </div>
                            @foreach ($MerchandisePaginate3 as $Merchandise)
                                @if ($time < 3)
                                    @php
                                        $time = $time + 1;
                                    @endphp
                                    @if ($time == 1)
                                        <div class="vote-first vote-item">
                                            <div class="vote-rank">本周第一</div>
                                            <div class="vote-pic">
                                                <img src="/img/vote_tea1.png">
                                            </div>
                                        @elseif ($time == 2)
                                            <div class="vote-second vote-item">
                                                <div class="vote-rank2">本周第二</div>
                                                <div class="vote-pic">
                                                    <img src="/img/vote_tea2.png">
                                                </div>
                                            @elseif ($time == 3)
                                                <div class="vote-second vote-item">
                                                    <div class="vote-rank2">本周第三</div>
                                                    <div class="vote-pic">
                                                        <img src="/img/vote_tea3.png">
                                                    </div>
                                    @endif
                                    <div class="vote-txt">
                                        <div class="vote-name">{{ $Merchandise->name }}</div>
                                        <div class="vote-votes">
                                            <i class="fas fa-vote-yea"></i>總票數 |<div class="votes">
                                                {{ $Merchandise->vote }}
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote-button">
                            <div id="listBtn3" onclick="listBtn3()">
                                <h6>投票去</h6>
                            </div>
                        </div>
                    </div>
                    <div id="textlistn3" style="display:none;">
                        <form action="/merchandise/votecheck" method="post">
                            <div class="votebox">
                                <div class="voting">
                                    <div class="voting-txt">
                                        <div class="voting-title">
                                            <h2>本月飲品票選</h2>
                                            <p>點選您最喜歡的飲品並送出投票</p>
                                        </div>
                                        <div class="voting-btn">
                                            @foreach ($MerchandisePaginate3 as $Merchandise)
                                                <div class="menu-list">
                                                    <div>
                                                        <div class="rows border-dot no-gutters drink_set">
                                                            <div class="button_content">
                                                                <input type="radio" name="id"
                                                                    value="{{ $Merchandise->id }}"
                                                                    id="{{ $Merchandise->id }}">
                                                            </div>
                                                            <div class="col-12 menu-item-name">
                                                                <h6>{{ $Merchandise->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="center">
                                            <div id="num_btn_text">
                                                <button type="submit" class="submit color-1">
                                                    送出投票
                                                </button>
                                            </div>
                                            {{ csrf_field() }}
                                        </div>
                                    </div>
                                    <div class="close" onclick="listBtn3()">
                                        <i class="fas fa-times-circle closeBlock"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
</body>

</html>
