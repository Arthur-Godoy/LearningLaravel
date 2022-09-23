@extends('layouts.main')
@section('title', 'HCD Events - Detalhes')

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
                        <p class="mr-3 fs-6 d-inline"><ion-icon name="checkmark-circle"></ion-icon> Assentos Garantidos</p>
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
            <p class="mb-3 fs-6"><ion-icon name="people"></ion-icon> {{ count($event->users) }} Participantes</p>
            <p class="mb-3 fs-6"><ion-icon name="star"></ion-icon> Promovido por: {{ $owner }}</p>
            @if($isSub)
                <form method="POST" action="/events/leave/{{ $event->id }}">
                    @csrf
                    @method('DELETE')
                    <h6 class="mx-3 mb-3 text-muted">Você já está inscrito</h6>
                    <button type="submit" class="p-2 btn btn-danger">Cancelar Presença</button>
                </form>
            @else
                <form method="POST" action="/events/join/{{ $event->id }}">
                    @csrf
                    <button type="submit" class="p-2 btn btn-primary">Confirmar Presença</button>
                </form>
            @endif

        </div>
        <div class=" mt-2 col-md-9 offset-2 justify">
            <h5 class="fw-bold">Sobre o Evento:</h5>
            <p class="fs-6">{{ $event->description }}</p>
        </div>
    </div>
@endsection
