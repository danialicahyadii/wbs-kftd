<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="default" data-sidebar="dark" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="img-2" data-preloader="enable">

<head>

    <meta charset="utf-8" />
    <title>WBS | KFTD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('lorahost/img/kftd_white.png') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('interactive/assets/js/layout.js') }}"></script>

    <link href="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('interactive/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('interactive/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('interactive/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('interactive/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}
    <script type='text/javascript'
        src='{{ asset('interactive/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}'></script>
    @stack('css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('apps.admin.components.header')

        @include('apps.admin.components.modal-remove')
        <!-- ========== App Menu ========== -->
        @include('apps.admin.components.sidebar')
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            @include('apps.admin.components.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    @include('apps.admin.components.back-to-top')
    <!--end back-to-top-->


    <!--preloader-->
    @include('apps.admin.components.preloader')

    <!-- Theme Settings -->
    @include('apps.admin.components.theme')

    <!-- JAVASCRIPT -->
    <script src="{{ asset('interactive/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('interactive/assets/js/plugins.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('interactive/assets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    @stack('js')
</body>

</html>
