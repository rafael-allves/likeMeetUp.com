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
        <link rel="stylesheet" href=@yield('style')>
    </head>
    <body >
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/assets/logo.png" alt="Rafa Events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Eventos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Criar Eventos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Entrar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Cadastrar
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer>RAFA Events &copy; 2023</footer>

        <script type="module" src=@yield('script')></script>
    </body>
</html>
