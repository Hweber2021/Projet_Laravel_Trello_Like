<header>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <td class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </td>
                    @if (Route::has('register'))
                        <td class="nav-item">
                            <a class="nav-link" href="{{ route('signup') }}">{{ __('Inscription') }}</a>
                        </td>
                    @endif
                    @else
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Deconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
</header>

