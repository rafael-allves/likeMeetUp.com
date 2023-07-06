@extends('layouts.main')

@section('title', 'DashBoard')

@section('specialStyle', 'css/auth/authType.css')

@section('content')

<section class="main__container__form__section">
    <div class="main__container__form__section_authtype">
        <button
        type="button"
        id="meusEventosBtn">
            Meus Eventos
        </button>
    </div>
    <span class="authSelected">Meus Eventos</span>
    <div class="main__container__form__section_authtype">
        <button
        type="button"
        id="eventosParticipoBtn"
        >
            Eventos que participo
        </button>
    </div>
</section>

<section id="meusEventos"class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>
        Meus Eventos
    </h1>

    <div class="col-md-10 dashboard-events-container">
        @if(count($myevents) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Nome
                        </th>
                        <th scope="col">
                            Participantes
                        </th>
                        <th scope="col">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myevents as $event)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="events/{{$event->id}}">
                                    {{$event->title}}
                                </a>
                            </td>
                            <td>
                                {{count($event->users)}}
                            </td>
                            <td>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>
                Nenhum Evento Encontrado.
                <a href="/events/create">
                    Criar Evento!
                </a>
            </p>
        @endif
    </div>
</section>
<section id="eventosParticipo"class="col-md-10 offset-md-1 dashboard-title-container" style="display:none;">
    <h1>
        Eventos Que Participo
    </h1>

    <div class="col-md-10 dashboard-events-container">
        @if(count($eventsparticipant) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            Nome
                        </th>
                        <th scope="col">
                            Participantes
                        </th>
                        <th scope="col">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventsparticipant as $event)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="events/{{$event->id}}">
                                    {{$event->title}}
                                </a>
                            </td>
                            <td>
                                {{count($event->users)}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger delete-btn">
                                    Sair do Evento!
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>
                Nenhum Evento Encontrado.
                <a href="/">
                    Procurar Eventos!
                </a>
            </p>
        @endif
    </div>
</section>
<script src="/js/dashboard/main.js"></script>

@endsection
