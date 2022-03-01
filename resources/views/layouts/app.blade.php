<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Style CSS -->
        @yield('style')

        <!-- Meta -->
        @yield('meta')

        <!-- script head -->
        @yield('js-head')

        <!-- Title -->
        <title>@yield('title')</title>
    </head>
    <body>

        <!-- Menu -->
        @include('components.menu')
    
        <!-- Content -->
        <main>
            @if(session()->has('success'))
                <p>{{ session('success') }}</p>
                <br>
            @endif

            @yield('content')
        </main>

        <!-- Script Body -->

        <footer>
            @include('components.footer')
        </footer>

        @yield('script')
    </body>
</html>