@extends('layout.main')

@section('title', $title)

@section('content')
    <div class="w3l-menublock py-5">
        <div id="w3l-menublock2" class="text-center menu_counter">
            @include('components.validationErrorMessage')
            <input id="tab1" type="radio" name="kind" value="O" checked>
            <label class="tabtle" for="tab1">原味純茶</label>
            <input id="tab2" type="radio" name="kind" value="M">
            <label class="tabtle" for="tab2">拿鐵鮮奶</label>
            <input id="tab3" type="radio" name="kind" value="S">
            <label class="tabtle" for="tab3">手調風味</label>
            <section id="content1" class="tab-content text-left">
                <div class="rows menu-body">
                    <div class="col-lg-6 menu-section pr-lg-5">
                        @foreach ($MerchandisePaginate as $Merchandise)
                            @if ($Merchandise->kind == 'O')
                                <div class="menu-item">
                                    <div>
                                        <div class="rows border-dot no-gutters">
                                            <div class="col-12 menu-item-name">
                                                <h6>{{ $Merchandise->name }}</h6>
                                            </div>
                                            <div class="col-4 menu-item-price text-right">
                                                <h6>大{{ $Merchandise->big_price }}元 小{{ $Merchandise->small_price }}元</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6 menu-section pl-lg-5 text-center">
                        <img src="/img/menu_tea1.png" alt="" class="radius-image img-fluid1">
                    </div>
                </div>
            </section>
            <section id="content2" class="tab-content text-left">
                <div class="rows menu-body">
                    <div class="col-lg-6 menu-section pr-lg-5">
                        @foreach ($MerchandisePaginate as $Merchandise)
                            @if ($Merchandise->kind == 'M')
                                <div class="menu-item">
                                    <div class="rows border-dot no-gutters">
                                        <div class="col-12 menu-item-name">
                                            <h6>{{ $Merchandise->name }}</h6>
                                        </div>
                                        <div class="col-4 menu-item-price text-right">
                                            <h6>大{{ $Merchandise->big_price }}元 小{{ $Merchandise->small_price }}元</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6 menu-section pl-lg-5 text-center">
                        <img src="/img/menu_tea2.png" alt="" class="radius-image img-fluid1">
                    </div>
                </div>
            </section>
            <section id="content3" class="tab-content text-left">
                <div class="rows menu-body">
                    <div class="col-lg-6 menu-section pr-lg-5">
                        @foreach ($MerchandisePaginate as $Merchandise)
                            @if ($Merchandise->kind == 'S')
                                <div class="menu-item">
                                    <div class="rows border-dot no-gutters">
                                        <div class="col-12 menu-item-name">
                                            <h6>{{ $Merchandise->name }}</h6>
                                        </div>
                                        <div class="col-4 menu-item-price text-right">
                                            <h6>大{{ $Merchandise->big_price }}元 小{{ $Merchandise->small_price }}元</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6 menu-section pl-lg-5 text-center">
                        <img src="/img/menu_tea3.png" alt="" class="radius-image img-fluid1">
                    </div>
                </div>
            </section>
            {{ $MerchandisePaginate->links() }}
        </div>
    </div>
@endsection
