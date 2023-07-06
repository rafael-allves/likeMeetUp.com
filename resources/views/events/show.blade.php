@extends('layouts.main')

@section('title', $event->title)

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="{{asset($event->image)}}" class="img-fluid" alt="{{$event->title}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <h2>
                    <ion-icon name="calendar-outline"></ion-icon>
                    {{ date('d/m/Y', strtotime($event->date)) }}
                </h2>
                <p class="event-city">
                    <ion-icon name="location-outline">
                    </ion-icon>
                    {{$event->city}}
                </p>
                <p class="evenrrs-participants">
                    <ion-icon name="people-outline">
                    </ion-icon>
                    {{count($event->users)}}
                    Participantes
                </p>
                <p class="event-owner">
                    <ion-icon name="star-outline">
                    </ion-icon>
                    {{$dono}}
                </p>
                @if (!$event->users()->where('user_id', Auth::user()->id)->exists())
                    <form action="join/{{ $event->id }}" method="POST">
                        @csrf
                        <button  type="submit" class="btn btn-primary" id="event-submit">
                            Confirmar Presença
                        </button>
                    </form>
                @else
                    <form action="/events/leave/{{$event->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href="#" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Sair do Evento!
                        </button>
                    </form>
                @endif

                @if($event->user_id == Auth::user()->id)
                    <a class="btn btn-info edit-btn"href="/events/edit/{{$event->id}}">
                        <ion-icon name="create-outline"></ion-icon>
                        Editar
                    </a>
                    <form action="/events/delete/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Deletar
                        </button>
                    </form>
                @endif

                <h3>O Evento Conta Com:</h3>
                <ul id="items-list">
                    @if($event->items && count(json_decode($event->items)) > 0)
                        @foreach (json_decode($event->items) as $item)
                            <li>
                                <ion-icon name="play-outline">
                                </ion-icon>
                                <span>
                                    {{$item}}
                                </span>
                            </li>
                        @endforeach
                    @else
                    <p>Características não adicionadas</p>
                    @endif
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">
                    {{$event->description}}
                </p>
            </div>
        </div>
    </div>
@endsection
