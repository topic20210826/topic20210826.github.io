@extends('layout.main')

@section('title', $title)

@section('content')
    <div class="py-lg-4 py-md-3">
        <div class="edit_content">
            @include('components.validationErrorMessage')
            <form action="/create_join/createjoin" method="post" enctype="multipart/form-data" class="edit_page">
                <div class="form-input">
                    <label>團名：</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-input">
                    <label>截單時間：</label>
                    <input type="date" name="arrived_data" min="<?= date('Y-m-d',strtotime('+1 day')) ?>"
                        max="<?= date('Y-m-d', strtotime('+7 day', time())) ?>">
                </div>
                <div class="form-input">
                    <label>目標杯數：</label>
                    <select name="price" class="select_cup">
                        <option value="30">30杯 9折</option>
                        <option value="40">40杯 8折</option>
                        <option value="50">50杯 7折</option>
                    </select>
                </div>
                <div class="form-input">
                    <label>折扣飲料：</label>
                    <select name="merchandise" class="select_cup">
                        <optgroup label="原味純茶" name="kind" value="O">
                            @foreach ($MerchandisePaginate as $Merchandise)
                                @if ($Merchandise->kind == 'O')
                                    <option value="{{ $Merchandise->name }}">{{ $Merchandise->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="拿鐵鮮奶" name="kind" value="M">
                            @foreach ($MerchandisePaginate as $Merchandise)
                                @if ($Merchandise->kind == 'M')
                                    <option value="{{ $Merchandise->name }}">{{ $Merchandise->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="手調風味" name="kind" value="S">
                            @foreach ($MerchandisePaginate as $Merchandise)
                                @if ($Merchandise->kind == 'S')
                                    <option value="{{ $Merchandise->name }}">{{ $Merchandise->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <button type="submit" class="btn">加入團購</button>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
