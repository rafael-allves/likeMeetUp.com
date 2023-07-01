@extends('layouts.main')

@section('title', "Rafa Events")

@section('content')
    <section id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="" method="get">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procure um Evento">
        </form>
    </section>
    <section id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <section id="cards-container" class="row">
            @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="{{ asset ($event->image) }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">
                        01/07/2023
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
        </section>
    </section>

@endsection
