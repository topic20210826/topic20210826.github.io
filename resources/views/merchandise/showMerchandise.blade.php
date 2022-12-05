@extends('layout.main')

@section('title', $title)

@section('content')

    <div class="py-5 py-lg-4 py-md-3">
        @include('components.validationErrorMessage')
        <form action="/merchandise/{{ $Merchandise->id }}/buy" method="post">
            <div id="drink_data">
                <div id="shop_drink_name_title">
                    <h2 id="shop_drink_name">{{ $Merchandise->name }}</h2>
                </div>
                <div class="drink_set">
                    <div class="set_title">
                        <span>大小</span>
                    </div>
                    <div id="cup" class="set_item">
                        <div>
                            <label for="big_price" id="14">
                                <input type="radio" name="size" checked="checked" value="B" id="14">大杯{{ $Merchandise->big_price }}元</label>
                            <label for="small_cup" id = "15">
                                <input type="radio" name="size" value="S" id="15">小杯{{ $Merchandise->small_price }}元</label>
                        </div>
                    </div>
                </div>

                {{-- F:正常 S:少糖 H:半糖 M:微糖 N:無糖 --}}
                <div class="drink_set">
                    <div class="set_title">
                        <span>甜度</span>
                    </div>
                    <div id="setType1" class="set_item">
                        <div>
                            <div>
                                <input type="radio" id="1" name="sweet" value="F" checked="checked">
                                <label for="1">正常糖</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" id="2" name="sweet" value="S">
                                <label for="2">少糖</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" id="3" name="sweet" value="H">
                                <label for="3">半糖</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" id="4" name="sweet" value="M">
                                <label for="4">微糖</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" id="5" name="sweet" value="N">
                                <label for="5">無糖</label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- F:正常 S:少冰 M:微冰 N:去冰 --}}
                <div class="drink_set">
                    <div class="set_title">
                        <span>冰度</span>
                    </div>
                    <div id="setType2" class="set_item">
                        <div>
                            <div>
                                <input type="radio" id="6" name="ice" value="F" checked="checked">
                                <label for="6">正常冰</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="radio" id="7" name="ice" value="S">
                                <label for="7">少冰</label>
                            </div>
                        </div>
                        <div>
                            <div><input type="radio" id="8" name="ice" value="M"><label
                                    for="8">微冰</label></div>
                        </div>
                        <div>
                            <div><input type="radio" id="9" name="ice" value="N"><label
                                    for="9">去冰</label></div>
                        </div>
                    </div>
                </div>
                <div class="drink_set">
                    <div class="set_title">
                        <span>加料</span>
                    </div>
                    <div id="setType3" class="set_item">
                        <div>
                            <div>
                                <input type="hidden" name="tapioca" value="N" />
                                <input type="checkbox" class="checkable" id="10" name="tapioca" value="Y">
                                <label for="10">珍珠</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="hidden" name="red" value="N" />
                                <input type="checkbox" class="checkable" id="11" name="red" value="Y">
                                <label for="11">紅豆</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="hidden" name="iu" value="N" />
                                <input type="checkbox" class="checkable" id="12" name="iu" value="Y">
                                <label for="12">愛玉</label>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input type="hidden" name="eigo" value="N" />
                                <input type="checkbox" class="checkable" id="13" name="eigo" value="Y">
                                <label for="13">椰果</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="num_btn_wrapper">
                    <div id="num_btn">
                        <input type='button' value='-' class='qtyminus' field='count'>
                        <input type='text' name='count' value='1' class='qty'>
                        <input type='button' value='+' class='qtyplus' field='count'>
                    </div>
                    <div id="num_btn_text">
                        <button type="submit">
                            購買
                        </button>
                    </div>
                    {{ csrf_field() }}
                </div>
        </form>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/bc767de587.js" crossorigin="anonymous"></script>
    <script src="/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

    <script src="/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

    <script src="/js/owl.carousel.js"></script><!-- owl carousel -->

@endsection
