<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$user->name}}</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/user/edit/style.css">
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
	<main class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Configurações da Conta</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="{{asset($user->profile_pic)}}" alt="Image" class="shadow">
						</div>
						<h4 class="text-center">{{$user->name}}</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i>
							Conta
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
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
							<button class="btn btn-primary">Atualizar</button>
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
