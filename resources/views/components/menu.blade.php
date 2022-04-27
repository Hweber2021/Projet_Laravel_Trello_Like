<nav id="menu" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/image/logo.png" alt="logo">
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
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </td>
                    @endif
                    @else
                    <div class="menu-right" aria-labelledby="navbarDropdown">

                        <a id="profileLink" class="profile-link" href="{{ route('user.profile') }}">
                            <img class="rounded-circle" src="/image/{{ Auth()->user()->profiledp }}" style="width: 40px; height: 40px; border-radius:50%; margin-right:15px; position: relative; top: 12px;"/>
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
