@extends("layouts.master")
@section("obsah")
    <div class="logContainer">
        <h5>Vitaj vo svojom profile {{ Auth::user()->name }}</h5>

        <form action="edit/{{ Auth::user()->id }}">
            @csrf
            <button class="loginButton" type="submit">Upraviť profil</button>
        </form>

        <form action="delete/{{ Auth::user()->id }}">
            @csrf
            <button class="loginButton" type="submit">Vymazať profil</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="loginButton" type="submit">Odhlásiť sa</button>
        </form>
    </div>



@endsection

