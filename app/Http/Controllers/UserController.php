<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\Facades\Hash; //Preciso disso pra encriptografar senhas na db

use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return view('users.auth');
    }

    public function store(Request $request){
        $data = $request->all();

        try{
            $validUsername = Validator::make($data, [
                'username' => 'required',
            ]);

            if($validUsername->fails())return response()->json(['registerusername' => 'Campo não preenchido corretamente'], 400);

            $validEmail = Validator::make($data, [
                'email' => 'required|email|unique:users,email',
            ]);

            if($validEmail->fails())return response()->json(['registeremail' => 'email já cadastrado'], 400);

            $validPassword = Validator::make($data, [
                'password' => 'required',
            ]);

            if($validPassword->fails())return response()->json(['registerpassword' => 'Campo não preenchido corretamente'], 400);
            //SE TODOS OS CAMPOS ESTIVEREM DEVIDAMENTE PREENCHIDOS EU VOU CONECTAR COM A TABELA users ENCRIPTOGRAFAR A SENHA E SALVAR O NOVO USUÁRIO

            $hash = Hash::make($data['password']);//Encriptografando a senha por padrão ele faz 1024 iterações
            $user = new User;

            $user->name = $data['username'];
            $user->email = $data['email'];
            $user->password = $hash;

            $user->save();
            return response()->json(['sucesso' => '/'], 200);
        }
        catch(Exception $err){
            return response()->json(['error' => $err], 500);
        }
    }
}
