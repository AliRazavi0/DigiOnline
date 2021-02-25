@extends('layouts.app')

@section('title')
    ورود به وب سایت
@endsection
@section('content')

    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{ config('app.name') }}
                </a>
                <div class="account-box-headline">
                    <a href="{{ route('login') }}" class="login-ds active-account">ورود</a>
                    <a href="{{ route('register') }}" class="register-ds">ثبت نام</a>
                </div>
                <div class="account-box-content">
                    <form action="{{ route('login') }}" class="form-account" method="POST">
                        @csrf
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
                        <div class="form-auth-row">
                            <label for="#" class="ui-checkbox">
                                <input type="checkbox" value="1" name="remeber" {{ old('remember') ? 'checked' : '' }}
                                    id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                            <label for="remember" class="remember-me">مرا به خاطر داشته باش</label>
                        </div>
                        <div class="parent-btn lr-ds">
                            <button class="dk-btn dk-btn-info">
                                ورود به {{ config('app.name') }}
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
