<div class="navigacia">
    <a class="{{Request::routeIs("homePage") ? "active":""}}" href="{{route("homePage")}}">
        Domov</a>
    <a class="{{Request::routeIs("tipyNaVyletPage") ? "active":""}}" href="{{route("tipyNaVyletPage")}}">Tipy na výlet</a>
    <a class="{{Request::routeIs("oNasPage") ? "active":""}}" href="{{route("oNasPage")}}">O nás</a>
    @guest
        @if (Route::has('login'))
            <a class="{{Request::routeIs("login") ? "active":""}}" href="{{route("login")}}">Prihlásiť</a>
        @endif
    @endguest
    @auth<a href="{{route("profilPage")}}" >
            @csrf
            Profil
        </a>@endauth
</div>
