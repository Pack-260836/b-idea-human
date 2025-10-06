<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B-idea Human</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @include('inc.styles')
    @yield('css-content')
</head>

<body>
    <div class="container-scroller">
        <!-- navbar -->
        @include('inc.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('inc.sidebar_admin')

            <div class="main-panel">
                <!-- content -->
                @yield('content')

                <!-- footer -->
                @include('inc.footer')

            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <script src="{{ asset('assets/js/shared/jquery.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/app-token.js') }}"></script>
    <script src="{{ asset('assets/js/js-logout.js') }}"></script>
    <script type="text/javascript">
        var APP_BASE_URL = @json(url('/'));
    </script>
    @include('inc.scripts')
    @yield('js-content')
</body>

</html>