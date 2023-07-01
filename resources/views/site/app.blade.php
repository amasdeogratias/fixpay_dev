<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-{{config('app.name')}}</title>

    {{-- front end styles --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('frontend/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('frontend/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

</head>
<body>
@include('')

 {{-- include scripts  --}}
<script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>
</body>
</html>
