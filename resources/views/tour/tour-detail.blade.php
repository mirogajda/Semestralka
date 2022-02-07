@extends('common.master')

@section('main')
    <div class="content-start">

        <div class="tour-detail">
            <div class="image">
                <img src="data:image/jpeg;base64,{{base64_encode($tour->picture)}}" alt="">
            </div>

            <div class="title">
                <h2>{{$tour->name}}</h2>
            </div>

            <div class="info">
                <div>
                    <span class="bold">Odkiaľ:</span> {{$tour->from ?? ''}} <span class="bold">Kam:</span> {{$tour->to ?? ''}}
                </div>
                <div>
                    <span class="bold">Cena:</span> {{$tour->price}} € <span class="bold">Počet účastníkov:</span> {{$tour->countOfParticipant}}
                </div>
            </div>

            <div class="description">
                {!! $tour->description !!}
            </div>
        </div>
    </div>
@endsection
