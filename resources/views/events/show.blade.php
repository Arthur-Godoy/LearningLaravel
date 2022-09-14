@extends('layouts.main')
@section('title', 'HCD Events - {{$event->title}}')

@section('content')
    <div class="container row mt-3">
        <div class="col-md-4 offset-2">
            <img width="420px" class="mb-3" src="/assets/events/{{ $event->image }}" alt="">
        </div>
        <div class="col-md-5">
            <h1 class="display-6">{{ $event->title }}</h1>
            <p class="mb-4 fs-6"><ion-icon name="pin"></ion-icon> {{ $event->city }}</p>
            <p class="mb-4 fs-6"><ion-icon name="people"></ion-icon> 0 Participantes</p>
            <p class="mb-4 fs-6"><ion-icon name="star"></ion-icon> Promovido por: </p>
            <button class="p-2 btn btn-primary">Confirmar Presença</button>
        </div>
        <div class="col-md-9 offset-2 justify">
            <h5 class="fw-bold">Sobre o Evento:</h5>
            <p class="fs-6">{{ $event->description }}</p>
        </div>
    </div>
@endsection
