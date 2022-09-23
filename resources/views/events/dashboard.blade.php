@extends('layouts.main')
@section('title', 'HCD Events - DashBoard')

@section('content')
    <div class="container row mt-4">
        <div class="col-md-7 offset-1">
            <div>
                <h1 class="mb-3">Eventos Inscritos</h1>
                @if (sizeof($eventAsSubscriber) != 0)
                    @foreach ($eventAsSubscriber as $event)
                    <div class="row shadow-lg py-2 mb-5 rounded">
                        <div class="col-md-5">
                            <img  class="d-inline img-fluid rounded" src="/assets/events/{{ $event->image }}" alt="{{ $event->title }}">
                            <p class="fs-5 ms-2 mt-2"><ion-icon name="people"></ion-icon>Participantes: {{ count($event->users) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $event->title }}</h3>
                            <p>{{ $event->description }}</p>
                            @for ($i = 0; $i < sizeof($event->items); $i++)
                                @switch($event->items[$i])
                                    @case('palco')
                                        <p class="pr-3 fs-6"><ion-icon name="cube"></ion-icon> Palco</p>
                                        @break
                                    @case('assentos')
                                        <p class="mr-3 fs-6"><ion-icon name="checkmark-circle"></ion-icon> Assentos Garantidos</p>
                                        @break
                                    @case('openBar')
                                        <p class="mr-3 fs-6"><ion-icon name="beer"></ion-icon> Open Bar</p>
                                        @break
                                    @case('Palco')
                                        <p class="mr-3 fs-6"><ion-icon name="restaurant"></ion-icon> Open Food</p>
                                        @break
                                @endswitch
                            @endfor
                            <form class="d-inline" action="/events/leave/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <h5 class="m-5">Não há Eventos Incritos - <a href="/">Início</a></h5>
                @endif
            </div>
            <div>
                <h1 class="mb-3">Eventos Promovidos</h1>
                @if (sizeof($events) == 0)
                    <h5 class="m-5">Não há Eventos Incritos - <a href="/">Início</a></h5>
                @else
                    @foreach ($events as $event)
                        <div class="row shadow-lg p-3 mb-5 rounded">
                            <div class="col-md-5">
                                <img  class="d-inline img-fluid rounded" src="/assets/events/{{ $event->image }}" alt="{{ $event->title }}">
                                <p class="fs-5 ms-2 mt-2"><ion-icon name="people"></ion-icon>Participantes: {{ count($event->users) }}</p>
                            </div>
                            <div class="col-md-6">
                                <h3>{{ $event->title }}</h3>
                                <p>{{ $event->description }}</p>
                                @for ($i = 0; $i < sizeof($event->items); $i++)
                                    @switch($event->items[$i])
                                        @case('palco')
                                            <p class="pr-3 fs-6"><ion-icon name="cube"></ion-icon> Palco</p>
                                            @break
                                        @case('assentos')
                                            <p class="mr-3 fs-6"><ion-icon name="checkmark-circle"></ion-icon> Assentos Garantidos</p>
                                            @break
                                        @case('openBar')
                                            <p class="mr-3 fs-6"><ion-icon name="beer"></ion-icon> Open Bar</p>
                                            @break
                                        @case('Palco')
                                            <p class="mr-3 fs-6"><ion-icon name="restaurant"></ion-icon> Open Food</p>
                                            @break
                                    @endswitch
                                @endfor
                                <a href="/events/edit/{{ $event->id }}"><button class="offset-8 btn btn-primary">Editar</button></a>
                                <form class="d-inline" action="/events/{{$event->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><ion-icon name="trash"></ion-icon></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class=" shadow-lg p-3 mb-5 rounded">
                <h6 class="fw-bold ps-2 pt-2">Meu Perfil</h6>
                <p class="ms-3"><ion-icon name="person"></ion-icon> {{ $user->name }}</p>
                <p class="ms-3"><ion-icon name="mail"></ion-icon> {{ $user->email }}</p>
                <p class="ms-3"><ion-icon name="contacts"></ion-icon> Eventos: {{ sizeOf($events) }}</p>
            </div>
        </div>
    </div>
@endsection
