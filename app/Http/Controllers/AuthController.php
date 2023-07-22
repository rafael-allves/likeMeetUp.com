<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

use Illuminate\Support\Facades\Hash; //Preciso disso pra encriptografar senhas na db
use Illuminate\Support\Facades\Auth; //Preciso disso pra gerenciar sessões no laravel
use Illuminate\Validation\Rules;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try{
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
        catch(Exception $err){
            return redirect('/auth', 500)->with($err);
        }
    }
    
    public function login (Request $request)
    {
        $data = $request->json()->all();
        try{
            $user = User::Where([
                ['email', $data['email']],
            ])->first();

            if(!$user)return response()->json(['campid' => 'loginemail', 'message' => 'Email não cadastrado'], 400);

            if (!Hash::check($data['password'], $user->password))return response()->json(['campid' => 'loginpassword', 'message' => 'Senha incorreta!'], 400);
            //to usando o HASH pq eu encriptei a senha!
            Auth::login($user);
            return response()->json(['sucesso' => '/']);

        }catch(Exception $err){
            return response()->json(['error' => $err], 500);
        }
    }

    public function logout()
    {
        Auth::logout(Auth::user());
        return redirect('/users/create');
    }
}
