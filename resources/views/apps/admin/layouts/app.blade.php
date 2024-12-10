<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="default" data-sidebar="dark" data-topbar="dark"
    data-sidebar-size="lg" data-sidebar-image="img-2" data-preloader="enable">

<head>

    <meta charset="utf-8" />
    <title>WBS - KFTD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="IT KFTD" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('lorahost/img/kftd.png') }}">

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
    <script nonce="{{ csp_nonce() }}" src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script nonce="{{ csp_nonce() }}">
        var id = {{ Auth::user()->id }};
        Pusher.logToConsole = true;

        var pusher = new Pusher('936768dd47c4a9b5133d', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe(`pengaduan.${id}`);
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data.isi.total_komentar));
            var totalKomentar = data.isi.total_komentar;
            var komentarList = data.isi.komentars;

            document.getElementById('notificationBadge').innerText = totalKomentar;

            var commentsHtml = '';
            komentarList.forEach(function(komentar) {
                commentsHtml += `
                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                <span
                                                    class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 lh-base">${komentar.komentar}
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check01">
                                                    <label class="form-check-label"
                                                        for="all-notification-check01"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                `;
            });
            document.getElementById('commentsList').innerHTML = commentsHtml;
        });
    </script>

    @stack('css')
</head>

<body>
    {{-- @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9']) --}}
    @include('sweetalert::alert')
    {{-- <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p> --}}
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
    <script src="{{ asset('interactive/assets/js/custom.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script nonce="{{ csp_nonce() }}">
        function updateUnreadCount() {
            fetch('/notifications/unread')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('notificationBadge').innerText = data.unread_count;
                });
        }
        updateUnreadCount();
    </script>
    @stack('js')
</body>

</html>
