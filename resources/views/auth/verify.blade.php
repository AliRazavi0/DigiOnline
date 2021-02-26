@extends('layouts.app')

@section('title')
  تایید ایمیل
@endsection
@section('content')

    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{ config('app.name') }}
                </a>

                <div class="account-box-content">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert" style="font-size: 12px">
                           لینک تایید ایمیل به اکانت ایمیل شما ارسال گردیده شد لطفا ایمیل خود را چک کنید . با تشکر
                        </div>
                    @endif
                    <form method="POST" action="{{ route('verification.resend') }}" class="form-account">
                        @csrf

                        <div class="parent-btn lr-ds">
                            <button class="dk-btn dk-btn-info btn-block">
                                تایید ایمیل
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
