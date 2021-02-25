@extends('layouts.app')

@section('title','فراموشی رمز عبور ')

@section('content')
    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{ config('app.name') }}
                </a>
                <div class="account-box-headline">
                    <a href="{{ route('login') }}" class="login-ds">ورود</a>
                    <a href="{{ route('register') }}" class="register-ds">ثبت نام</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success mt-5 " style="font-size: 12px" role="alert">
                        لینک بازیابی رمز عبور شما با ایمیل وارد شده ارسال گردیده شد لذا وارد ایمیل خود شوید و لینک
                        بازیابی رو بزنید .
                    </div>
                @endif
                <div class="account-box-content">
                    <form method="POST" action="{{ route('password.email') }}" class="form-account">
                        @csrf
                        <div class="form-account-title">
                            <label for="email">ایمیل </label>
                            <input class="number-email-input @error('email') is-invalid @enderror" id="email"
                                   type="email"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="ایمیل خود را وارد کنید ...">
                            <span class="mdi mdi-account-outline"></span>


                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="parent-btn lr-ds">
                            <button class="dk-btn dk-btn-info">
                                ارسال ایمیل
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection



