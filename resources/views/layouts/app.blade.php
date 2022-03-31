<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/_layout.css') }}">
</head>
<body>
    <div id="app">
        
        <!-- Menu -->
        @if(empty($menuDisable))
            @include('components.menu')
        @endif

        <!-- Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- footer -->
        @include('components.footer')
    </div>

    <footer>
            @include('components.footer')
    </footer>
</body>
</html>
