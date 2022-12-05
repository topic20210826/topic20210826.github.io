@extends('layout.master')

@section('title', $title)

@section('content')
    <div class="create_table">
        <div class="edit_content">
            @include('components.validationErrorMessage')
            <form action="/merchandise/{{ $Merchandise->id }}" method="post" enctype="multipart/form-data" class="edit_page">
                <!--隱藏方法欄位-->
                {{ method_field('PUT') }}
                <!--隱藏方法欄位:輸出結果-->
                <input type="hidden" name="_method" value="PUT">
                <div class="form-input">
                    <label>飲料狀態：</label>
                    <select name="status" class="select_edit">
                        <option value="C" @if (old('status', $Merchandise->status) == 'C') selected @endif>
                            編輯中
                        </option>
                        <option value="S" @if (old('status', $Merchandise->status) == 'S') selected @endif>
                            販售中
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label>飲料分類：</label>
                    <select name="kind" class="select_edit">
                        <option value="O" @if (old('kind', $Merchandise->kind) == 'O') selected @endif>
                            原味純茶
                        </option>
                        <option value="M" @if (old('kind', $Merchandise->kind) == 'M') selected @endif>
                            拿鐵鮮奶
                        </option>
                        <option value="S" @if (old('kind', $Merchandise->kind) == 'S') selected @endif>
                            手調風味
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label>飲料名稱：</label>
                    <input type="text" name="name" placeholder="飲料名稱" value="{{ old('name', $Merchandise->name) }}">
                </div>
                <div class="form-input">
                    <label>大杯價格：</label>
                    <input type="text" name="big_price" placeholder="大杯價格" value="{{ old('big_price', $Merchandise->big_price) }}">
                </div>
                <div class="form-input">
                    <label>小杯價格：</label>
                    <input type="text" name="small_price" placeholder="小杯價格" value="{{ old('small_price', $Merchandise->small_price) }}">
                </div>
                <button type="submit" class="btn">更新商品資訊</button>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
