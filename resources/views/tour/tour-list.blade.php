@extends('common.master')

@section('main')
    <div class="content-start">
        @if(auth()->check())
            <div class="list-menu">
                <a href="{{route('tour-list')}}">Všetky túry</a>
                <a href="{{route('tour-list', ['createdByMe' => 'true'])}}">Moje túry</a>
                <a href="{{route('new-tour')}}">Pridať túru</a>
            </div>
        @endif

        <div class="tour-wrapper">
            @foreach ($tours as $tour)
                <div class="tour-card">
                    <input type="text" hidden name="id" value="{{$tour->id}}">
                    <div class="image">
                        <img src="data:image/jpeg;base64,{{base64_encode($tour->picture)}}" alt="">
                    </div>

                    <div class="content">
                        <h3>
                            {{$tour->name}}
                            <span class="place"> ({{$tour->from ?? ''}} - {{$tour->to ?? ''}})</span>
                        </h3>
                        <div class="info">
                            Cena: {{$tour->price}} Počet osôb: {{$tour->countOfParticipant}}
                        </div>
                        <div class="description">
                            {{$tour->description}}
                        </div>
                        <div class="footer">
                            @if(Auth::id() === $tour->user_id)
                                <button class="btn btn-red">Vymazať</button>
                                <button class="btn btn-orange"
                                        type="button"
                                        onclick="window.location='{{route('edit-tour', ['id' => $tour->id])}}'">
                                    Upraviť
                                </button>
                            @endif
                            <button class="btn btn-primary"
                                    type="button"
                                    onclick="window.location='{{route('tour-detail', ['id' => $tour->id])}}'">
                                VIac info
                            </button>
                        </div>
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

            if (!confirm('Naozaj chceš vymazať túru?')) {
                return;
            }

            const parentWrapper = $(event.target).parent().parent().parent();
            const data = {
                _token: '{{csrf_token()}}',
                id: $(parentWrapper).find("input[name='id']").val(),
            };

            $.ajax({
                type: 'DELETE',
                url: '{{route('remove-tour')}}',
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
