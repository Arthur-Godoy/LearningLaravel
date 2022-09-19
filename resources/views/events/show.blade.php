@extends('layouts.main')
@section('title', 'HCD Events - {{$event->title}}')

@section('content')
    <div class="container row mt-3">
        <div class="col-md-4 offset-2 mt-3">
            <img width="420px" class="mb-3" src="/assets/events/{{ $event->image }}" alt="">
            @for ($i = 0; $i < sizeof($event->items);$i++)
                @switch($event->items[$i])
                    @case('palco')
                        <p class="pr-3 fs-6 d-inline"><ion-icon name="cube"></ion-icon> Palco</p>
                        @break
                    @case('assentos')
                        <p class="mr-3 fs-6 d-inline"><ion-icon name="arrow-forward"></ion-icon> Assentos Garantidos</p>
                        @break
                    @case('openBar')
                        <p class="mr-3 fs-6 d-inline"><ion-icon name="beer"></ion-icon> Open Bar</p>
                        @break
                    @case('Palco')
                        <p class="mr-3 fs-6 d-inline"><ion-icon name="restaurant"></ion-icon> Open Food</p>
                        @break
                @endswitch
            @endfor
        </div>
        <div class="col-md-5">
            <h1 class="display-6">{{ $event->title }}</h1>
            <p class="mb-3 fs-6"><ion-icon name="pin"></ion-icon> {{ $event->city }}</p>
            <p class="mb-3 fs-6"><ion-icon name="people"></ion-icon> 0 Participantes</p>
            <p class="mb-3 fs-6"><ion-icon name="star"></ion-icon> Promovido por: </p>
            <button class="p-2 btn btn-primary">Confirmar Presença</button>
        </div>
        <div class=" mt-2 col-md-9 offset-2 justify">
            <h5 class="fw-bold">Sobre o Evento:</h5>
            <p class="fs-6">{{ $event->description }}</p>
        </div>
    </div>
@endsection
