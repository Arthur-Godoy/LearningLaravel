@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <div id="search-container" class="col-md-12 text-center">
        <h1>Busque um evento</h1>
        <form action="/" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search && sizeof($events) != 0)
            <h2>Exibindo Resultados para: {{ $search }}</h2>
        @elseif (sizeof($events) != 0)
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach($events as $event)
            <div class="card col-md-3">
                <img src="assets/events/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">{{ count($event->users) }} Participantes</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
            @if (sizeof($events) == 0 && $search)
                <h3 class="mb-4 mt-5">Não Achamos Resultados para sua Busca:{{ $search }}</h3>
                <h5 style="margin-left: 50px"><a href="/">Ver Todos</a></h5>

            @elseif (sizeof($events) == 0)
                <h3>Não há eventos Disponiveis</h3>
            @endif
        </div>
    </div>
@endsection
