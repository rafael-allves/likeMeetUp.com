<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Autenticação</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/css/auth/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/assets/logo.png" width="40px" height="40px" alt="Rafa Events">
                    Rafa Events
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin-right: 10px;">
                        <a href="/" class="nav-link">
                            Home
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="main__container">
                <header class="main__container__header">
                    <h2 class="main__container__header_h2">
                        <img src="/assets/logo.png" width="40px" height="40px" alt="Rafa Events" />
                        Rafa Events
                    </h2>

                    <h1 class="main__container__header_h1">
                        Bem-vindo
                    </h1>

                    <small>Por Favor, Informe suas credenciais</small>
                </header>
                <section>
                    <section class="main__container__form__section">
                        <div class="main__container__form__section_authtype">
                            <button
                            type="button"
                            id="login">
                                Login
                            </button>
                        </div>
                        <span class="authSelected">Login</span>
                        <div class="main__container__form__section_authtype">
                            <button
                            type="button"
                            id="register"
                            >
                                Register
                            </button>
                        </div>
                    </section>
                    <section>
                        <form id="loginform" class="auth" method="POST">
                            @csrf
                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    mail
                                </span>
                                <div class="input__text">
                                    <label for="loginemail">Email</label>
                                    <input type="email" name="loginemail" id="loginemail" class="input__camp_input" required maxlength="64">
                                    <span class="material-symbols-outlined">

                                    </span>
                                </div>
                            </div>
                            <p class="errorMessage">
                            </p>
                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    lock
                                </span>
                                <div class="input__text">
                                    <label for="loginpassword">Senha</label>
                                    <input type="password" name="loginpassword" id="loginpassword" class="input__camp_input" required minlength="8">
                                    <button class="showpassbtn" type="button">
                                        <span class="material-symbols-outlined">
                                            visibility_off
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <p class="errorMessage"></p>
                            <button id="formLogin" class="authButton" type="submit">LOGIN</button>

                            <footer class="auth__options">
                                <fieldset class="auth__options_fieldset">
                                    <legend>Or Continue With</legend>
                                            <button>

                                            </button>
                                            <button>

                                            </button>
                                            <button>

                                            </button>
                                </fieldset>
                            </footer>

                        </form>
                        <form class="auth" id="registerform" method="POST">
                            @csrf
                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    person
                                </span>
                                <div class="input__text">
                                    <label for="registerusername">Nome</label>
                                    <input type="username" name="registerusername" id="registerusername" class="input__camp_input" required minlength="4">
                                    <span class="material-symbols-outlined">

                                    </span>
                                </div>
                            </div>
                            <p class="errorMessage"></p>
                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    mail
                                </span>
                                <div class="input__text">
                                    <label for="registeremail">Email</label>
                                    <input type="email" name="registeremail" id="registeremail" class="input__camp_input" required maxlength="64">
                                    <span class="material-symbols-outlined">

                                    </span>
                                </div>
                            </div>
                            <p class="errorMessage"></p>
                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    lock
                                </span>
                                <div class="input__text">
                                    <label for="registerpassword">Senha</label>
                                    <input type="password" name="registerpassword" id="registerpassword" class="input__camp_input" required minlength="8">
                                    <button class="showpassbtn" type="button">
                                        <span class="material-symbols-outlined">
                                            visibility_off
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <p class="errorMessage"></p>

                            <div class="input__camp">
                                <span class="material-symbols-outlined input__camp_icon">
                                    lock
                                </span>
                                <div class="input__text">
                                    <label for="confirmpassword">Confirmar Senha</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="input__camp_input" required>
                                    <button class="showpassbtn" type="button">
                                        <span class="material-symbols-outlined">
                                            visibility_off
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <p class="errorMessage"></p>

                            <button id="formRegister" class="authButton" type="submit">REGISTER</button>

                            <footer class="auth__options">
                                <fieldset class="auth__options_fieldset">
                                    <legend>Or Continue With</legend>
                                            <button>

                                            </button>
                                            <button>

                                            </button>
                                            <button>

                                            </button>
                                </fieldset>
                            </footer>
                        </form>
                    </section>
                </section>
        </section>
    </main>
    <footer>RAFA Events &copy; 2023</footer>
    <script src="/js/auth/main.js" type="module"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</body>
</html>
