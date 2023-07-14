<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="@yield('specialStyle')">
    </head>
    <body >
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/assets/logo.png" width="40px" height="40px" alt="Rafa Events">
                        Rafa Events
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">
                                Criar Eventos
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a href="/users/create" class="nav-link">
                                    Entrar/cadastrar
                                </a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                                    <img
                                        @if(Auth::user()->profile_pic)
                                            src="{{asset(Auth::user()->profile_pic)}}"
                                        @else
                                            src="{{asset('/assets/customer.png')}}"
                                        @endif
                                        id="user-pic" alt="{{Auth::user()->name}}">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <h2 class="dropdowntitle">
                                        <img style="border-radius:100%"
                                        @if(Auth::user()->profile_pic)
                                            src="{{asset(Auth::user()->profile_pic)}}"
                                        @else
                                            src="{{asset('/assets/customer.png')}}"
                                        @endif
                                        id="user-pic" alt="{{Auth::user()->name}}">
                                        {{Auth::user()->name}}
                                    </h2>
                                    <a class="dropdown-item" href="/users/{{ Auth::user()->id }}/edit">
                                        <ion-icon name="person-circle-outline"></ion-icon>
                                        Editar Perfil
                                    </a>
                                    <a href="/dashboard" class="dropdown-item">
                                        <ion-icon name="people-circle-outline"></ion-icon>
                                        Eventos
                                    </a>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a class="dropdown-item"
                                        onclick="this.closest('form').submit();"
                                        style="cursor: pointer;">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                            Sair
                                        </a>
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{session('msg')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        <footer>RAFA Events &copy; 2023</footer>

        <script src="{{asset('/js/dropdownUserPic.js')}}"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>
