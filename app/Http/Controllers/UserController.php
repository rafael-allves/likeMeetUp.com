<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        if($user != null){
            Auth::login($user);
            return redirect('/');
        }

        return Inertia::render('users/Auth', [
            "user" => ["user" => ""],
        ]);
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
            return redirect('/users/' . $user->id . '/edit');
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
