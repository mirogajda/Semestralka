<header>

    <a href="{{route('intro')}}">
        Úvod
    </a>

    <a href="{{route('article-list')}}">
        Články
    </a>

    <a href="{{route('tour-list')}}">
        Túry
    </a>

    <div class="auth-section">
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Prihlásenie</a>
            @endif

            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">Registrácia</a>
            @endif
        @else
            <a href="#" class="user-name">{{ Auth::user()->name }}</a>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Odhlásiť
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
</header>
