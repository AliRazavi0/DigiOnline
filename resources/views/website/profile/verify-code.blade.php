@extends('layouts.app')

@section('title')
   تایید شماره موبایل
@endsection
@section('content')
    <section class="page-account-box">
        <div class="col-lg-7 col-md-7 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="#" class="account-box-logo">
                    {{config('app.name')}}
                </a>
                <div class="account-box-content">
                    <div class="message-light">
                        <div class="massege-light-send">
                            برای شماره همراه {{$mobile}} کد تایید ارسال گردید
                            <div class="form-edit-number">
                                <a href="{{route('management.2fa.view')}}" class="edit-number-link">ویرایش شماره</a>
                            </div>
                        </div>
                        <form action="{{route('management.2fa.code')}}" method="POST">
                            @csrf
                            <div class="account-box-verify-content">
                                <div class="form-account">
                                    <div class="form-account-title">کد فعال سازی پیامک شده را وارد کنید</div>
                                    <div class="form-account-row">
                                        <div class="lines-number-input">
                                            <input name="code[]" type="text" class="line-number-account" maxlength="1">
                                            <input name="code[]" type="text" class="line-number-account" maxlength="1">
                                            <input name="code[]" type="text" class="line-number-account" maxlength="1">
                                            <input name="code[]" type="text" class="line-number-account" maxlength="1">
                                            <input name="code[]" type="text" class="line-number-account" maxlength="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-account-row">
                                <div class="receive-verify-code">
                                    <p id="countdown-verify-end"><a href="" class="link-border-verify form-account-link">ارسال مجدد</a></p>
                                </div>
                            </div>
                            <div class="account-footer">
                                <div class="account-footer">

                                    <button type="submit" class="btn bnt-info btn-sm rounded">تایید شماره موبایل</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
