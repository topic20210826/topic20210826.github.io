@extends('layout.sign')

@section('title', $title)

@section('content')
    <div class="top">
        <a href="/" class="brand-logo">回到首頁</a>
        <a href="/user/auth/sign-in" class="sign-in">登入 </a>
    </div>
    <div class="mid" style="margin-top:40px;">
        <h4>加入我們!!</h4>
        <p>創建一個帳號，就能訂購飲料了喔!</p>
    </div>
    <div class="error">
        @include('components.validationErrorMessage')
    </div>
    <form action="/user/auth/sign-up" method="post" class="signin-form">
        {!! csrf_field() !!}
        <div class="form-input">
            <label>暱稱</label>
            <input type="text" name="nickname" placeholder="" value="{{ old('nickname') }}">
        </div>
        <div class="form-input">
            <label>信箱</label>
            <input type="email" name="email" placeholder="" value="{{ old('email') }}">
        </div>
        <div class="form-input">
            <label>密碼</label>
            <input type="password" name="password" placeholder="最小長度為 6 碼">
        </div>
        <div class="form-input">
            <label>確認密碼</label>
            <input type="password" name="password_confirmation" placeholder="">
        </div>
        <button type="submit" class="btn">註冊會員</button>
    </form>
@endsection
