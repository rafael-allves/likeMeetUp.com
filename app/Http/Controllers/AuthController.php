<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash; //Preciso disso pra encriptografar senhas na db
use Illuminate\Support\Facades\Auth; //Preciso disso pra gerenciar sessões no laravel
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //SE TODOS OS CAMPOS ESTIVEREM DEVIDAMENTE PREENCHIDOS EU VOU CONECTAR COM A TABELA users ENCRIPTOGRAFAR A SENHA E SALVAR O NOVO USUÁRIO

        $hash = Hash::make($request->password);//Encriptografando a senha por padrão ele faz 1024 iterações

        $user = User::create(array_merge($request->all(), ['password' => $hash]));

        // FAÇA O LOGIN AUTOMÁTICO APÓS O REGISTRO
        Auth::login($user);

        return redirect('/');
    }
    
    public function login (LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(Auth::user());

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/users/create');
    }
}
