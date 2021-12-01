<div class="navigacia">
    <a class="{{Request::routeIs("homePage") ? "active":""}}" href="{{route("homePage")}}">
        Domov</a>
    <a class="{{Request::routeIs("tipyNaVyletPage") ? "active":""}}" href="{{route("tipyNaVyletPage")}}">Tipy na výlet</a>
    <a class="{{Request::routeIs("oNasPage") ? "active":""}}" href="{{route("oNasPage")}}">O nás</a>
    <a class="{{Request::routeIs("login") ? "active":""}}" href="{{route("login")}}">Prihlásiť</a>
{{--    <a method="POST" action="{{ route('logout') }}">@auth--}}
{{--                @csrf--}}
{{--                Log out--}}
{{--        @endauth</a>--}}
</div>
