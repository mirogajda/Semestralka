@extends("layouts.master")
@section("obsah")
    <form class="logContainer">
        @foreach($articles as $article)
                <div class="article-title">{{$article->title}}</div>
                <div class="popis4">{{$article->content}}</div>
                <div class="clanok-info">Článok bol naposledy upravený: {{$article->updated_at}}</div>
        @endforeach
    </form>
@endsection
