<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BabelShop') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Theme switcher (color modes) -->
    <script src="{{ asset('assets/js/theme-switcher.js') }}"></script>


    <!-- Preloaded local web font (Inter) -->
    <link rel="preload" as="font" type="font/woff2" crossorigin="" href="{{ asset('assets/fonts/inter-variable-latin.woff2') }}">
    <!-- Font icons -->
    <link rel="preload" href="{{ asset('assets/icons/cartzilla-icons.woff2') }}" as="font" type="font/woff2" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/icons/cartzilla-icons.min.css') }}">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Bootstrap + Theme styles -->
    <link rel="preload" href="{{ asset('assets/css/theme.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/theme.rtl.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="theme-styles">

    <!-- Customizer -->
    <script src="{{ asset('assets/js/customizer.min.js') }}"></script>

    <!-- App css -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <style>
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Đổ bóng nhẹ thôi */
        }

    </style>

        @stack('style')

</head>
<body>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



    <div id="app">
        @include('partials.header')

        <main class="py-4">
            @yield('content')
        </main>


        @include('partials.footer')
    </div>


    <script src="{{ asset('assets/js/ajax.js') }}"></script>

    <!-- Vendor scripts -->
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/timezz/timezz.js') }}"></script>

    <!-- Bootstrap + Theme scripts -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <!-- Vendor scripts -->
    <script src="{{ asset('assets/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/choices.js/choices.min.js') }}"></script>
    @stack('script')
</body>
</html>
