@extends("layouts.master")
@section("obsah")
    <form class="logContainer" action="{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="cid" value="{{ $Info->id }}">
        <label for="">Meno:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$Info->name}}">
        <label for="">e-mail:</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{$Info->email}}">
        <button class="loginButton" type="submit">Uložiť</button>
    </form>




@endsection
