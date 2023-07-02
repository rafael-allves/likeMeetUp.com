@extends('layouts.main')

@section('title', "Rafa Events")

@section('content')
    <section id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procure um Evento">
            <button type="submit">
                <ion-icon name="search-outline"></ion-icon>
            </button>
        </form>
    </section>
    <section id="events-container" class="col-md-12">
        @if ($search)
            <h1>
                Buscando por: {{$search}}
            </h1>
        @else
            <h1>
                Próximos eventos
            </h1>
        @endif
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <section id="cards-container" class="row">
            @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="{{ asset ($event->image) }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">
                        {{ date('d/m/Y', strtotime($event->date)) }}
                    </p>
                    <h5 class="card-title">
                        {{$event->title}}
                    </h5>
                    <p class="card-participants">
                        X Participantes
                    </p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
            @endforeach
            @if(count($events) == 0 && !$search)
                <p>Não Há Eventos Disponíveis</p>
            @elseif(count($events) == 0)
                <p>
                    Nenhum Evento Encontrado com {{ $search }}
                    <a href="/">Ver Todos</a>
                </p>
            @endif
        </section>
    </section>
@endsection
