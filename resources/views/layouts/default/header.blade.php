<nav>
    <div class="nav-wrapper">
        <div class="container">
            <a href="{{ route('index') }}" class="brand-logo">{{ env('APP_NAME') }}</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Registrar</a></li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Sair
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
