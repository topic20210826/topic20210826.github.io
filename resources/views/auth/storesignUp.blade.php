@extends('layout.sign')

@section('title', $title)

@section('content')
    <div class="mid" style="margin-top:40px;">
        <h4>加入我們的團隊吧!!</h4>
        <p>創建一個帳號，開始管理訂單!</p>
    </div>
    <div class="error">
        @include('components.validationErrorMessage')
    </div>
    <form action="/user/auth/store-sign-up" method="post" class="signin-form">
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
            <label>驗證碼</label>
            <input type="password_check" name="password_check" placeholder="123456">
        </div>
        <button type="submit" class="btn" name="type" value="A">註冊會員</button>
    </form>
@endsection
