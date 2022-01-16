@extends("layouts.master")
@section("obsah")
    <form method="POST" action="{{url('/clanky/vytvorit')}}" >
        @csrf

        <label for="title">
            Názov:
            <input id="title" name="title" type="text">
        </label>

        <label for="content">
            Content:
            <textarea id="content" name="content"></textarea>
        </label>

        <label for="hashtag">
            Hashtag:
            <input id="hashtag" name="hashtag" type="text">
        </label>

        <label for="region">
            Region:
            <select id="region" name="region">
                @foreach($options as $option)
                    <option value="{{$option->tag}}" >{{$option->tag}}</option>
                @endforeach
            </select>
        </label>

        <button type="submit">Pridaj</button>
    </form>

@endsection
