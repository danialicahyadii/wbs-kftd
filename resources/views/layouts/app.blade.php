<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WBS - KFTD</title>
    <link rel="icon" href="{{ asset('lorahost/img/kftd.png') }}" type="image/x-icon">
    {{-- <link rel="shortcut icon" href="{{ asset('lorahost/img/kftd_white.png') }}"> --}}

    <link rel="stylesheet" href="{{ asset('lorahost/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lorahost/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('lorahost/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lorahost/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lorahost/css/style.css') }}">
    @stack('css')
</head>

<body>

    <!--================ Header Menu Area start =================-->
    @include('components.header')
    <!--================Header Menu Area =================-->


    @yield('content')


    <!-- ================ start footer Area ================= -->
    @include('components.footer')
    <!-- ================ End footer Area ================= -->

    <script src="{{ asset('lorahost/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('lorahost/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lorahost/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lorahost/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('lorahost/js/mail-script.js') }}"></script>
    <script src="{{ asset('lorahost/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('js')
</body>

</html>
