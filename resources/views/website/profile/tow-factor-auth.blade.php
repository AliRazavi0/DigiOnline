@extends('website.layouts.main')

@section('title','پروفایل کاربری')

@section('content')

    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link">حساب کاربری من</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link active-breadcrumb">پروفایل</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 pull-right">
            <section class="page-aside">
                <div class="sidebar-wrapper">
                    <div class="box-sidebar">
                        <div class="profile-box">
                            <div class="profile-box-avator">
                                <a href="#">
                                    <img src="assets/images/profile/user-profile.svg">
                                </a>
                            </div>
                            <div class="profile-box-content">
                                <span class="profile-box-nameuser">
                                    {{auth()->user()->name}}
                                </span>
                                <span
                                    class="profile-box-phone">شماره همراه : {{auth()->user()->mobile ? auth()->user()->mobile : 'شما شماره موبایل وارد نکرده اید'}}</span>
                                <a href="#"><span class="profile-box-row-arrow">کیف پول : 0 تومان </span></a>
                                <a href="#"><span class="profile-box-row-arrow">دیجی کلاب : 0 امتیاز</span></a>
                            </div>
                            <div class="profile-box-tabs">
                                <a href="{{route('password.request')}}" class="profile-box-tab">تغییر رمز</a>
                                <a href="/test" class="profile-box-tab-sign-out">خروج از حساب</a>
                            </div>
                        </div>
                    </div>


                    <div class="box-sidebar">
                        <span class="box-header-sidebar">حساب کاربری شما</span>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{route('profile.index')}}"
                                   class="profile-menu-url {{request()->path() === 'profile' ? 'active-profile' : ''}}">
                                    <span class="mdi mdi-account-outline"></span>
                                    پروفایل</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="fa fa-shopping-basket"></span>
                                    همه سفارش ها</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="fa fa-file-text-o"></span>
                                    در خواست مرجوعی</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="fa fa-star-o"></span>
                                    لیست علاقه مندی ها</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="fa fa-file-text-o"></span>
                                    نقد و نظرات</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="mdi mdi-map"></span>
                                    آدرس ها</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="fa fa-clock-o"></span>
                                    بازدید های اخیر</a>
                            </li>
                            <li>
                                <a href="#" class="profile-menu-url">
                                    <span class="mdi mdi-account-outline"></span>
                                    اطلاعات شخصی</a>
                            </li>

                            <li>
                                <a href="{{route('management.2fa.view')}}"
                                   class="profile-menu-url {{request()->path() === 'profile/twofactorauth' ? 'active-profile' : ''}}">
                                    <span class="mdi mdi-account-settings"></span>
                                    تنظیمات اکانت کاربری</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-9 col-md-9 col-xs-12 pull-left">
            <section class="page-contents">
                <div class="profile-content">
                    <div class="profile-navbar">
                        <div class="profile-navbar-back-alignment">
                            <a href="#" class="profile-navbar-btn-back">بازگشت</a>
                            <h4 class="edit-personal">ویرایش اطلاعات شخصی</h4>
                        </div>
                    </div>
                    <div class="profile-stats">
                        @include('error.error')

                        <form action="" method="POST">
                            @csrf
                            <div class="profile-stats-row">
                                <fieldset class="form-legal-fieldset">
                                    <h4 class="form-legal-headline">احراز هویت دو مرحله ایی </h4>

                                    <div class="form-legal-center">
                                        <div class="profile-stats-col">
                                            <div class="profile-stats-content">
                                                <span class="profile-first-title">نوع:</span>
                                                <select name="type" id="type"
                                                        class="@error('type') is-invalid @enderror">
                                                    @foreach(config('twofactor.types') as $key=>$value)
                                                        <option value="{{$key}}" {{auth()->user()->type === $key ? 'selected' : ''}}>{{$value}} </option>
                                                    @endforeach

                                                </select>

                                                @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                 </span>
                                                @enderror


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-legal-center">
                                        <div class="profile-stats-col">
                                            <div class="profile-stats-content">
                                                <span class="profile-first-title"> شماره موبایل  :</span>
                                                <input class="ui-input-field @error('mobile') is-invalid @enderror"
                                                       type="text" name="mobile" value="{{old('mobile') ?? auth()->user()->mobile}}"
                                                       placeholder="شماره موبایل خود را وارد کنید">
                                            </div>

                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </fieldset>
                                <div class="col-12" style="padding:0;">
                                    <div class="profile-stats-row form-legal-row-submit">
                                        <div class="parent-btn parent-store">
                                            <button type="submit" class="dk-btn dk-btn-info btn-store">
                                                ثبت اطلاعات
                                                <i class="fa fa-sign-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!--    adplacemen-container----------------------------->
    @include('website.profile.adplacement')
    <!--    adplacemen-container----------------------------->
    </div>

@endsection
