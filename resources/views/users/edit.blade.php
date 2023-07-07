<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$user->name}}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/user/edit/style.css">
    <link rel="stylesheet" href="/css/styles.css">
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
                            <a href="/auth" class="nav-link">
                                Entrar/cadastrar
                            </a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                                <img src="{{Auth::user()->profile_pic}}" id="user-pic" alt="{{Auth::user()->name}}">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <h2 class="dropdowntitle">
                                    <img src="{{Auth::user()->profile_pic}}" id="user-pic" alt="{{Auth::user()->name}}">
                                    {{Auth::user()->name}}
                                </h2>
                                <a class="dropdown-item" href="/user/edit">
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
	<main id="main-container">
		<div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3" id="pic-tab">
                            <img src="{{asset($user->profile_pic)}}" alt="Image" class="shadow" id="user-pic-tab">
                            <input type="file" name="profile-pic" id="file">
                            <label for="file" id="btnUpFile">
                                <ion-icon name="camera-reverse-outline"></ion-icon>
                            </label>
                        </div>
						<h4 class="text-center">{{$user->name}}</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <ion-icon name="home"></ion-icon>							Conta
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                            <ion-icon name="key"></ion-icon>
                            Senha
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Configurações da Conta</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Nome</label>
								  	<input type="text" class="form-control" value="{{$user->name}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" value="{{$user->email}}">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Bio</label>
									<textarea class="form-control" rows="4" placeholder="Conte um pouco sobre você">{{$user->bio}}</textarea>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" id="perfilSettings">Atualizar</button>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Redefinir Senha</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Senha Antiga</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Nova Senha</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirmar Nova Senha</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Atualizar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

    <footer>RAFA Events &copy; 2023</footer>
    <script src="/js/user/edit/main.js"></script>
    <script src="/js/dropdownUserPic.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
