@extends('common.master')

@section('main')
    <div class="content-start">
        @if(auth()->check())
            <div class="list-menu">
                <a href="{{route('article-list')}}">Všetky články</a>
                <a href="{{route('article-list', ['createdByMe' => 'true'])}}">Moje články</a>
                <a href="{{route('new-article')}}">Pridať článok</a>
            </div>
        @endif

        <div class="articles-wrapper">
            @foreach ($articles as $article)
                <div class="article-card">
                    <input type="text" hidden name="id" value="{{$article->id}}">
                    <div class="image">
                        <img src="data:image/jpeg;base64,{{base64_encode($article->picture)}}" alt="">
                    </div>
                    <h3>{{$article->name}}</h3>
                    <div class="description">
                        {{$article->description}}
                    </div>
                    <div class="footer">
                        @if(Auth::id() === $article->user_id)
                            <button class="btn btn-red">Vymazať</button>
                            <button class="btn btn-orange"
                                    type="button"
                                    onclick="window.location='{{route('edit-article', ['id' => $article->id])}}'">
                                Upraviť
                            </button>
                        @endif
                        <button class="btn btn-primary"
                                type="button"
                                onclick="window.location='{{route('article-detail', ['id' => $article->id])}}'">
                            Čítaj viac
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('.btn-red').on('click', function () {
            event.preventDefault();

            if (!confirm('Naozaj chceš vymazať článok?')) {
                return;
            }

            const parentWrapper = $(event.target).parent().parent();
            const data = {
                _token: '{{csrf_token()}}',
                id: $(parentWrapper).find("input[name='id']").val(),
            };

            $.ajax({
                type: 'DELETE',
                url: '{{route('remove-article')}}',
                data,
                success: function (payload) {
                    parentWrapper.remove();
                },
                error: function (payload) {
                    throw new Error('Occurred error during request.');
                },
            })
        })
    </script>
@endsection
