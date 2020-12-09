<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DentaSys') }}</title>
    <link rel="icon" type="image/png" href="assets/img/logo.ico" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


</head>
<body class="bg-white">
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/90a9905657.js" crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('/assets/js/main.js')}}"></script>


</body>

</html>