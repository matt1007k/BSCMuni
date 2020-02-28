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
    <link rel="stylesheet" href="{{ asset('/vendors/jquery-toast/jquery.toast.css') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/shared/style.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/css/demo_1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/helpers.css') }}">
</head>

<body>
    <div id="app">
        <div class="container-scroller">
            <!-- partial -->
            @include('partials.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('partials.sidebar')
                <!-- main -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('header-content')

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('/vendors/jquery-toast/jquery.toast.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('/js/shared/misc.js') }}"></script>

    <!-- Custom js for this page-->
    <script src="{{ asset('js/demo_1/dashboard.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
    <script>
        $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            @if(session('msg'))
            $.toast({
                heading: 'Mensaje del sistema',
                text: "{{session('msg')}}",
                icon: 'success',
                position: 'top-right',       // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            })
            @endif
    </script>
    <style>
        .nav-item.active {
            background: rgb(15, 37, 213);
        }
    </style>
</body>

</html>