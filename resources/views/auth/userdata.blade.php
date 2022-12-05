@extends('layout.users')

@section('title', $title)

@section('content')
    <div class="userdata-right">
        <div class="error">
            @include('components.validationErrorMessage')
        </div>
        <form action="/user/auth/userdata" method="post" class="userdata-form">
            {!! csrf_field() !!}
            <div class="user-row">
                <div class="input-left">
                    <label>暱稱</label>
                </div>
                <div class="input-right">
                    <input type="text" name="nickname" placeholder="">
                </div>
            </div>
            <div class="user-row">
                <div class="input-left">
                    <label>信箱</label>
                </div>
                <div class="input-right">
                    <input type="hidden" name="email" value=" {{ $User->email }}" />
                    <h6>{{ $User->email }}</h6>
                </div>
            </div>
            <div class="user-row">
                <div class="input-left">
                    <label>新的密碼</label>
                </div>
                <div class="input-right">
                    <input type="password" name="password" placeholder="最小長度為 6 碼">
                </div>
            </div>
            <div class="user-row">
                <div class="input-left">
                    <label>確認密碼</label>
                </div>
                <div class="input-right">
                    <input type="password" name="password_confirmation" placeholder="">
                </div>
            </div>
            <div class="userdata-buttom">
                <button type="submit" class="btn">修改使用者資料</button>
            </div>
        </form>
    </div>
@endsection
