@extends('layouts.main')
@section('title', 'HCD Events - Criar')

@section('content')
    <div id="event-create" class="col-md-6 offset-md-3 mt-3">
        <h1>Crie o seu Evento</h1>
        <form class="mb-2" action="/events" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Evento:</label>
                <input type="text" name="name" id="nameEvent" class="form-control" placeholder="Nome do Evento..." required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" name="city" id="cityEvent" class="form-control" placeholder="Cidade do Evento..." required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data do Evento:</label>
                <input type="date" name="date" id="eventDate" class="form-control" placeholder="Data do Evento..." required>
            </div>
            <div class="mb-3">
                <label for="privacy" class="form-label">Privacidade do Evento:</label>
                <select class="form-control" name="privacy" id="privacitEvent" required>
                    <option value="1">Privado</option>
                    <option value="0">Publico</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <textarea class="form-control" name="description" id="descriptionEvent" placeholder="Descreva o Evento, sua descrição será lida na página principal" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="checks">Estrutura:</label>
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
                <label for="image">Escolha a Imagem:</label>
                <input type="file" id="image"  name="image" accept="image/png, image/jpeg, image/webp, image/jpg" class="form-control" required>
            </div>
            <button style="width: 100px" type="submit" class="btn btn-primary mr-2">Enviar</button>
        </form>
        <a href="/"><button style="width: 100px" type="" class="btn btn-danger" >Cancelar</button></a>
    </div>
@endsection
