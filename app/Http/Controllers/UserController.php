<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\Facades\Hash; //Preciso disso pra encriptografar senhas na db
use Illuminate\Support\Facades\Auth; //Preciso disso pra gerenciar sessões no laravel
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class UserController extends Controller
{

    public function index(){
        $user = Auth::user();

    }
    public function dashboard(){
        $user = Auth::user();
        $myEvents = $user->events;

        $eventsParticipant = $user->eventAsParticipant;

        return view('users.dashboard', ['myevents' => $myEvents, 'eventsparticipant' => $eventsParticipant]);

    }

    public function create(){
        return view('users.auth');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        try{
            $validUsername = Validator::make($data, [
                'name' => 'required',
            ]);

            if($validUsername->fails())return response()->json(['campid' => 'registerusername', 'message' =>'Campo não preenchido corretamente'], 400);

            $validEmail = Validator::make($data, [
                'email' => 'required|email|unique:users,email',
            ]);

            if($validEmail->fails())return response()->json(['campid' => 'registeremail', 'message' => 'email já cadastrado'], 400);

            $validPassword = Validator::make($data, [
                'password' => 'required',
            ]);

            if($validPassword->fails())return response()->json(['campid' => 'registerpassword', 'message' => 'Campo não preenchido corretamente'], 400);
            //SE TODOS OS CAMPOS ESTIVEREM DEVIDAMENTE PREENCHIDOS EU VOU CONECTAR COM A TABELA users ENCRIPTOGRAFAR A SENHA E SALVAR O NOVO USUÁRIO

            $hash = Hash::make($data['password']);//Encriptografando a senha por padrão ele faz 1024 iterações

            $user = User::create(array_merge($data, ['password' => $hash]));

            // FAÇA O LOGIN AUTOMÁTICO APÓS O REGISTRO
            Auth::login($user);

            return response()->json(['sucesso' => '/'], 200);
        }
        catch(Exception $err){
            return response()->json(['error' => $err], 500);
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

    public function logout(){
        Auth::logout();
        return redirect('/auth');
    }

    public function edit(){
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request){
        $user = User::findOrFail($request->id);
        $data = $request->all();

        if($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()){
            if($user->profile_pic)Storage::delete('public/users/' . explode('storage/users/', $user->profile_pic)[1]);

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));

            $request->image->move(storage_path('/app/public/users'), $imageName . '.' . $extension);

            $data['profile_pic'] = "storage/users/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }elseif($request->hasFile('image') && !$request->file('image')->isValid()){
            return redirect()->back()->withInput()->withErrors(['image' => 'O campo de imagem está incorreto.']);
        }

        $user->update($data);
        return redirect('/user/edit')
        ->with('msg', 'Perfil Editado Com Sucesso!');
    }
}
