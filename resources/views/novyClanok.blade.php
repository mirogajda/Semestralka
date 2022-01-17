@extends("layouts.master")
@section("obsah")
    <form class="logContainer" method="POST" action="{{url('/clanky/vytvorit')}}" >
        @csrf

        <label for="title">
            Názov:
            <input id="title" name="title" type="text">

        </label>

        <label for="content">
            Obsah:
            <textarea class="textarea" id="content" name="content"></textarea>
        </label>

        <label for="hashtag">
            Hashtag:
            <input id="hashtag" name="hashtag" type="text">
        </label>

        <label for="region">
            Kraj:
            <select id="region" name="region">
                @foreach($options as $option)
                    <option value="{{$option->name}}" >{{$option->name}}</option>
                @endforeach
            </select>
        </label>

        <button type="submit">Pridaj</button>

    </form>


@endsection
