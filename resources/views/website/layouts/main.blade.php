
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <title>profile</title>

    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
<!--header------------------------------------->
@include('website.layouts.parials.header')
<!--header------------------------------------->


@yield('content')
<!--    product-slider----------------------------------->
@include('website.layouts.parials.product-slider')
<!--    product-slider------------------------->

<!--profile------------------------------------>

<!--footer------------------------------------->

<!--footer------------------------------------->

</body>

<script src="{{asset('/js/main.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
</html>
