@extends('layouts.app')

@section('content')
    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{ config('app.name') }}
                </a>

                <div class="account-box-content">
                    <form  class="form-account"  method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-account-title">
                            <label for="email">ایمیل </label>
                            <input class="number-email-input @error('email') is-invalid @enderror" id="email" type="email"
                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                   placeholder="ایمیل خود را وارد کنید ...">
                            <span class="mdi mdi-email"></span>


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
                                تایید
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

