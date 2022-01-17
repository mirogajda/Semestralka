@extends("layouts.master")
@section("obsah")


    <div class="logContainer">
        @foreach($images as $image)
            <img class="obrazok2"
                 src="{{$image->url}}"
            >
            <div>{{$image->description}}</div>
        @endforeach
    </div>



@endsection
