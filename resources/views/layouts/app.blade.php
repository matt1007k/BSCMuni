<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BSC Constructora</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('partials.navbar')

        @if (session('msg'))
        <div class="container-fluid">
            <div class="alert alert-success padding-small">
                {{session('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        
        @yield('content')

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    @stack('scripts')
</body>

</html>