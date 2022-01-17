@extends("layouts.master")
@section("obsah")
    <form class="logContainer" method="POST" action="{{url('/novy-obrazok/pridat')}}" >
        @csrf

        <label for="url">
            URL obrázka:
            <input id="url" name="url" type="text">
        </label>

        <label for="description">
            Popis obrázka:
            <input id="description" name="description" type="text">
        </label>



        <button class="loginButton" type="submit">Pridaj</button>

    </form>


@endsection
