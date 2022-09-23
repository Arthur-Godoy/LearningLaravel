@extends('layouts.main')
@section('title', 'HCD Events - Editar')

@section('content')
    <div id="event-create" class="col-md-6 offset-md-3 mt-3">
        <h1>Editar Evento</h1>
        <form class="mb-2" action="/events/update/{{ $event->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Evento:</label>
                <input type="text" name="title" id="nameEvent" class="form-control" placeholder="Nome do Evento..." value="{{ $event->title }}" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" name="city" id="cityEvent" class="form-control" placeholder="Cidade do Evento..." value="{{ $event->city }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data do Evento:</label>
                <input type="date" name="date" id="eventDate" class="form-control" placeholder="Data do Evento..." value="{{ $event->date->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="private" class="form-label">Privacidade do Evento:</label>
                <select class="form-control" name="private" required>
                    <option value="1" >Privado</option>
                    <option value="0" {{ $event->private == 0 ? "selected" : "" }}>Publico</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <textarea class="form-control" name="description" id="descriptionEvent" placeholder="Descreva o Evento, sua descrição será lida na página principal" rows="3" required>{{ $event->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="checks">Estrutura:</label>
                <small class="d-block text-muted">Marcados Anteriormente:
                    @foreach ($event->items as $item )
                        {{ $item }},
                    @endforeach
                </small>
                <small class="d-block text-muted">Caso nao marque nada permanecerá o marcado anteriormente, caso queira mudar deverá marcar novamente as opções</small>
                <div class="form-check">
                    <input name="items[]" class="form-check-input" type="checkbox" value="palco">
                    <label class="form-check-label">
                        Palco
                    </label>
                </div>
                <div class="form-check">
                    <input name="items[]" class="form-check-input" type="checkbox" value="assentos">
                    <label class="form-check-label">
                        Assentos
                    </label>
                </div>
                <div class="form-check">
                    <input name="items[]" class="form-check-input" type="checkbox" value="openBar">
                    <label class="form-check-label">
                        Open Bar
                    </label>
                </div>
                <div class="form-check">
                    <input name="items[]" class="form-check-input" type="checkbox" value="OpenFood">
                    <label class="form-check-label">
                        Open Food
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="image">Trocar a Imagem:</label>
                <input type="file" id="image"  name="image" accept="image/png, image/jpeg, image/webp, image/jpg" class="form-control" required>
            </div>
            <button style="width: 100px" type="submit" class="btn btn-primary mr-2">Atualizar</button>
        </form>
        <a href="/"><button style="width: 100px" type="" class="btn btn-danger" >Cancelar</button></a>
    </div>
    <div class="col-md-3" style="margin-top: 695px">
        <img class="shadow rounded" width="200px" src="/assets/events/{{ $event->image }}" alt="">
    </div>
@endsection
