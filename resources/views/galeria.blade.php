@extends("layouts.master")
@section("obsah")


    <form class="logContainer">
        @foreach($images as $image)
            <img class="obrazok2"
                 src="{{$image->url}}"
            >
            <div>{{$image->description}}</div>
        @endforeach
    </form>



@endsection
