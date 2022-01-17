<div class="navigacia">
    <a class="{{Request::routeIs("homePage") ? "active":""}}" href="{{route("homePage")}}">
        Domov</a>
    <a class="{{Request::routeIs("tipyNaVyletPage") ? "active":""}}" href="{{route("tipyNaVyletPage")}}">Tipy na výlet</a>
    <a class="{{Request::routeIs("oNasPage") ? "active":""}}" href="{{route("oNasPage")}}">O nás</a>
    <a class="{{Request::routeIs("galeriaPage") ? "active":""}}" href="{{route("galeriaPage")}}">Galéria</a>
    @guest
        @if (Route::has('login'))
            <a class="{{Request::routeIs("login") ? "active":""}}" href="{{route("login")}}">Prihlásiť</a>
        @endif
    @endguest
    @auth
        <a class="{{Request::routeIs("profilPage") ? "active":""}}" href="{{route("profilPage")}}" >
            @csrf
            Profil
        </a>
        <a class="{{Request::routeIs("novyClanokPage") ? "active":""}}"
           href="{{route("novyClanokPage")}}">Pridať nový článok</a>
        <a class="{{Request::routeIs("novyObrazokPage") ? "active":""}}"
           href="{{route("novyObrazokPage")}}">Pridať nový obrázok</a>
    @endauth
</div>
