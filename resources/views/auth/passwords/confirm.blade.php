@extends('layouts.app')
@section('title','تایید پسورد ')
@section('content')
    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{ config('app.name') }}
                </a>

                <div class="account-box-content">
                    <div class="alert alert-info">
                        برای دسترسی به این آدرس باید پسورد خود را تایید فرمایید . با تشکر
                    </div>
                    <form method="POST" action="{{ route('password.confirm') }}" class="form-account" >
                        @csrf

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

                        <div class="parent-btn lr-ds">
                            <button class="dk-btn dk-btn-info">
                                تایید پسورد
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

