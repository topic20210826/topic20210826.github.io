@extends('layout.sign')

@section('title', $title)

@section('content')
    <div class="top">
        <a href="/" class="brand-logo">回到首頁</a>
        <a href="/user/auth/sign-up" class="sign-in">註冊</a>
    </div>
    <div class="mid" style="margin-top:40px;">
        <h4>登入帳號!!</h4>
        <p>歡迎光臨!登入後就可以訂購飲料了~~</p>
    </div>
    <div class="error">
        @include('components.validationErrorMessage')
    </div>
    <form action="/user/auth/sign-in" method="post" class="signin-form">
        {!! csrf_field() !!}
        <div class="form-input">
            <label>信箱</label>
            <input type="email" name="email" placeholder="" value="{{ old('email') }}">
        </div>
        <div class="form-input">
            <label>密碼</label>
            <input type="password" name="password" placeholder="">
        </div>
        <button type="submit" class="btn">登入會員</button>
    </form>
@endsection
