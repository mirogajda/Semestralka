@extends('common.master')

@section('main')
    <form action="{{route(isset($tour) ? 'update-tour' : 'store-tour', (isset($tour) ? ['id' => $tour->id] : null))}}"
          class="new-tour-card"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        @isset($tour)
            <input type="text" hidden name="id" value="{{$tour->id}}">
        @endisset

        <h3>Nová túra</h3>

        <div class="form-group">
            <label>Názov</label>
            <input type="text" name="name" value="{{$tour->name ?? null}}">
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
            @isset($tour)
                <img id="preview" src="data:image/jpeg;base64,{{base64_encode($tour->picture)}}" alt="your image" class="preview"/>
            @else
                <img id="preview" hidden src="#" alt="your image" class="preview"/>
            @endisset
        </div>

        <div class="form-group">
            <label>Popis</label>
            <textarea name="description" rows="5">{{$tour->description ?? null}}</textarea>
            @error('description')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Odkiaľ</label>
            <input type="text" name="from" value="{{$tour->from ?? null}}">
            @error('from')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Kam</label>
            <input type="text" name="to" value="{{$tour->to ?? null}}">
            @error('to')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="text" name="price" value="{{$tour->price ?? null}}">
            @error('price')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Počet účastníkov</label>
            <input type="text" name="countOfParticipant" value="{{$tour->countOfParticipant ?? null}}">
            @error('countOfParticipant')
            <span class="error-message">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        @isset($tour)
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
