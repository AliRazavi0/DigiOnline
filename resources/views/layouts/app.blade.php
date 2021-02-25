<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport'/>

    <title>
        @yield('title')
    </title>


    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>
<body>

        <div class="container-main">
            <div class="col-12">
                <div class="semi-modal-layout">
                    @yield('content')
                    @include('layouts.footer')
                </div>
            </div>
        </div>

</body>

<!--main----------------------------------------->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@include('sweet::alert')
</html>
