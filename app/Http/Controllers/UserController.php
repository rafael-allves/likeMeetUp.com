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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

    public function logout()
    {
        Auth::logout(Auth::user());
        return redirect('/users/create');
    }

    public function dashboard(){
        $user = Auth::user();
        $myEvents = $user->events;

        $eventsParticipant = $user->eventAsParticipant;

        return view('users.dashboard', ['myevents' => $myEvents, 'eventsparticipant' => $eventsParticipant]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect('/users/auth');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $user = User::where([
            ['id', $id],
            ])->first();
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        
        if($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()){
            if($user->profile_pic)Storage::delete('public/users/' . explode('storage/users/', $user->profile_pic)[1]);

            $requestImage = $request->profile_pic;
            
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));
            
            $request->profile_pic->move(storage_path('/app/public/users'), $imageName . '.' . $extension);
            
            $data['profile_pic'] = "storage/users/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }elseif($request->hasFile('profile_pic') && !$request->file('profile_pic')->isValid()){
            return redirect('/users/' . $user->id . '/edit')->with('msg', 'DEU ERRADO SEU FILHO DA PUTA');
        }
        
        
        $user->update(array_merge($data));
        return response()->json(['redirect' => '/users/' . $user->id . '/edit'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
    }
}
