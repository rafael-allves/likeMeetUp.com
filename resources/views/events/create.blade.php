@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu Evento</h1>
    <form action="/events" method="POST">
        @csrf <!--Diretiva de pproteção para poder enviar dados com um form para uma db-->
        <div class="form-group">
            <label for="title">
                Título do Evento:
            </label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="city">
                Cidade do Evento:
            </label>
            <input type="text" name="city" id="city" class="form-control">
        </div>
        <div class="form-group">
            <label for="private">
                O evento é privado?
            </label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">
                Descrição:
            </label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="o que vai acontecer no evento?"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
</div>


@endsection

@section('script', '/js/events/create/main.js')
