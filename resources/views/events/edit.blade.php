@extends('layouts.main')

@section('title', 'Editando: {{$event->title}}')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
        <div class="form-group">
            <label for="image">
                Imagem do Evento:
            </label>
            <input type="file" id="image" name="image" class="from-control-fill" >
            <img src="{{asset($event->image)}}" alt="{{$event->title}}" class="img-preview">
        </div>

        <div class="form-group">
            <label for="title">
                Título do Evento:
            </label>
            <input type="text" name="title" id="title" class="form-control"  value="{{$event->title}}">
        </div>

        <div class="form-group">
            <label for="date">
                Data do Evento:
            </label>
            <input type="date" name="date" id="date" class="form-control"  value="{{date('Y-m-d', strtotime($event->date))}}">
        </div>


        <div class="form-group">
            <label for="city">
                Cidade do Evento:
            </label>
            <input type="text" name="city" id="city" class="form-control"  value="{{$event->city}}">
        </div>
        <div class="form-group">
            <label for="private">
                O evento é privado?
            </label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">
                Descrição:
            </label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="o que vai acontecer no evento?" required>{{$event->description}}</textarea>
        </div>
        <section class="form-group">
            <label>
                Adicione caracteristicas:
            </label>
            @if($event->items && count(json_decode($event->items)) > 0)
                @php
                    $items = json_decode($event->items, true);
                @endphp
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Cadeiras" {{ (in_array("Cadeiras", $items)) ? "checked='checked' "  :  ''  }}>Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Palco" {{ (in_array("Palco", $items)) ? "checked='checked' "  :  ''  }}>Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Open Bar" {{ (in_array("Open Bar", $items)) ? "checked='checked' "  :  ''  }}>Open Bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Open Food" {{ (in_array("Open Food", $items)) ? "checked='checked' "  :  ''  }}>Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Brindes" {{ (in_array("Brindes", $items)) ? "checked='checked' "  :  ''  }}>Brindes
                </div>
            @else
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Cadeiras" >Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Palco" >Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Open Bar" >Open Bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Open Food" >Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Brindes" >Brindes
                </div>
            @endif
        </section>
        <button type="submit" class="btn btn-primary">Editar Evento</button>
    </form>
</div>


@endsection
