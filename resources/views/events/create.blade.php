@extends('layouts.main')
@section('title', 'HCD Events - Criar')

@section('content')
    <div id="event-create" class="col-md-6 offset-md-3">
        <h1>Crie o seu Evento</h1>
        <form action="/events" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Evento:</label>
              <input type="text" name="name" id="nameEvent" class="form-control" placeholder="Nome do Evento...">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" name="city" id="cityEvent" class="form-control" placeholder="Cidade do Evento...">
              </div>
              <div class="mb-3">
                <label for="privacy" class="form-label">Privacidade do Evento:</label>
                <select class="form-control" name="privacy" id="privacitEvent">
                    <option>Privado</option>
                    <option>Publico</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <textarea class="form-control" name="description" id="descriptionEvent" placeholder="Descreva o Evento, sua descrição será lida na página principal" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
              <button class="btn btn-danger">Cancelar</button>
        </form>
    </div>
@endsection