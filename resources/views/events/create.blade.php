@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu Evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
         @csrf
         {{-- Diretiva de pproteção para poder enviar dados com um form para uma db
        Essa diretiva serve para prevenir ataques via formulário --}}
        <div class="form-group">
            <label for="image">
                Imagem do Evento:
            </label>
            <input type="file" id="image" name="image" class="from-control-fill" required>
        </div>

        <div class="form-group">
            <label for="title">
                Título do Evento:
            </label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date">
                Data do Evento:
            </label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="city">
                Cidade do Evento:
            </label>
            <input type="text" name="city" id="city" class="form-control" required>
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
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="o que vai acontecer no evento?" required></textarea>
        </div>
        <section class="form-group">
            <label>
                Adicione caracteristicas:
            </label>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Palco">Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Open Bar">Open Bar
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Open Food">Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="items" value="Brindes">Brindes
            </div>
        </section>
        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
</div>


@endsection
