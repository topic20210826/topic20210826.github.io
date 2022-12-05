@extends('layout.master')

@section('title', $title)

@section('content')
    <div class="create_table">
        <div class="edit_content">
            @include('components.validationErrorMessage')
            <form action="/merchandise/create" method="post" enctype="multipart/form-data" class="edit_page">
                <div class="form-input">
                    <label>飲料狀態：</label>
                    <select name="status" class="select_edit">
                        <option value="C" @if (old('status') == 'C') selected @endif>
                            編輯中
                        </option>
                        <option value="S" @if (old('status') == 'S') selected @endif>
                            販售中
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label>飲料分類：</label>
                    <select name="kind" class="select_edit">
                        <option value="O" @if (old('kind') == 'O') selected @endif>
                            原味純茶
                        </option>
                        <option value="M" @if (old('kind') == 'M') selected @endif>
                            拿鐵鮮奶
                        </option>
                        <option value="S" @if (old('kind') == 'S') selected @endif>
                            手調風味
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label>飲料名稱：</label>
                    <input type="text" name="name" placeholder="飲料名稱" value="{{ old('name') }}">
                </div>
                <div class="form-input">
                    <label>大杯價格：</label>
                    <input type="text" name="big_price" placeholder="大杯價格" value="{{ old('big_price') }}">
                </div>
                <div class="form-input">
                    <label>小杯價格：</label>
                    <input type="text" name="small_price" placeholder="小杯價格" value="{{ old('small_price') }}">
                </div>
                <button type="submit" class="btn">新增商品</button>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
