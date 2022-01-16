@extends("layouts.master")
@section("obsah")
    <div class="article-wrapper">
        @foreach($articles as $article)
            <div class="article">
                <div class="title">{{$article->title}}</div>
                <div class="content">{{$article->content}}</div>
            </div>
        @endforeach
    </div>
@endsection
