@extends('layouts.app')


@section('title')
    ثبت نام در وب سایت
@endsection
@section('content')


<section class="page-account-box">
    <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
        <div class="account-box">
            <a href="#" class="account-box-logo">
                {{ config('app.name') }}
            </a>
            <div class="account-box-headline">
                <a href="{{ route('login') }}" class="login-ds ">ورود</a>
                <a href="{{ route('register') }}" class="register-ds active-account">ثبت نام</a>
            </div>
            <div class="account-box-content">
                <form action="{{ route('register') }}" class="form-account" method="POST">
                    @csrf
                    <div class="form-account-title">
                        <label for="name">نام کاربری </label>
                        <input class="number-email-input @error('name') is-invalid @enderror" id="name" type="text"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="نام کاربری خود را وارد کنید ...">
                        <span class="mdi mdi-account-outline"></span>


                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-account-title">
                        <label for="mobile">شماره موبایل</label>
                        <input class="number-email-input @error('mobile') is-invalid @enderror" id="mobile" type="text"
                               name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus
                               placeholder="نام کاربری خود را وارد کنید ...">
                        <span class="mdi mdi-account-outline"></span>


                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-account-title">
                        <label for="email">ایمیل </label>
                        <input class="number-email-input @error('email') is-invalid @enderror" id="email" type="email"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="ایمیل خود را وارد کنید ...">
                        <span class="mdi mdi-account-outline"></span>


                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-account-title">
                        <label for="password">رمز عبور</label>
                        <input type="password" class="password-input @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"
                            placeholder="رمز عبور خود را وارد کنید ...">
                        <span class="mdi mdi-lock"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-account-title">
                        <label for="password_confirmation">تکرار رمز  عبور</label>
                        <input type="password" class="password-input @error('password') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="current-password"
                            placeholder="تکرار رمز عبور خود را وارد کنید ...">
                        <span class="mdi mdi-lock"></span>


                    </div>

                    <div class="parent-btn lr-ds">
                        <button class="dk-btn dk-btn-info">
                            ثبت نام در {{ config('app.name') }}
                            <i class="fa fa-sign-in sign-in"></i>
                        </button>
                    </div>
                    <div class="forget-password">
                        <a href="{{ route('password.request') }}" class="account-link-password">رمز خود را فراموش کرده
                            ام</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
