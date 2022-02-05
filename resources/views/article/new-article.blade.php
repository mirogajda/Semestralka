@extends('common.master')

@section('main')
    <form action="{{route(isset($article) ? 'update-article' : 'store-article', (isset($article) ? ['id' => $article->id] : null))}}"
          class="new-article-card"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        @isset($article)
            <input type="text" hidden name="id" value="{{$article->id}}">
        @endisset

        <h3>Nový článok</h3>

        <div class="form-group">
            <label>Nadpis</label>
            <input type="text" name="name" value="{{$article->name ?? null}}">
            @error('name')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Obrázok</label>
            <input id="picture" name="picture" type="file">
            @error('picture')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="preview-wrapper">
            @isset($article)
                <img id="preview" src="data:image/jpeg;base64,{{base64_encode($article->picture)}}" alt="your image" class="preview"/>
            @else
                <img id="preview" hidden src="#" alt="your image" class="preview"/>
            @endisset
        </div>

        <div class="form-group">
            <label>Popis</label>
            <textarea name="description" rows="5">{{$article->description ?? null}}</textarea>
            @error('description')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        @isset($article)
            <button class="btn btn-primary" type="submit">Uprav</button>
        @else
            <button class="btn btn-primary" type="submit">Pridaj</button>
        @endisset
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const preview = $('#preview');
                    preview.attr('src', e.target.result);
                    preview.show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#picture').change(function () {
            readURL(this);
        });
    </script>
@endsection
