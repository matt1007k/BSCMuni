<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BSC </title>

    <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.addons.css') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/shared/style.css') }}">
</head>

<body>
    <div class="container-scroller bg-info">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">

                    @yield('content')

                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- Scripts -->
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/shared/misc.js') }}"></script>

    @stack('scripts')
</body>

</html>