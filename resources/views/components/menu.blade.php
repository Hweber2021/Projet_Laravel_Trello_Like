<nav id="menu" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Acceuil') }}
        </a>

        <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav-ml-auto">
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
                    <div class="menu-right" aria-labelledby="navbarDropdown">
                        <a id="profile" class="profile-link" href="{{ route('user.index') }}">
                            {{ Auth::user()->name }}
                        </a>

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
