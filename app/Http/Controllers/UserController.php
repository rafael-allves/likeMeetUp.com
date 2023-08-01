<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Inertia\Inertia;

use Inertia\Response;
use Illuminate\Http\RedirectResponse;


use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create']);
        $this->middleware('auth')->except([
            'create',
            'show',
        ]);
    }

    public function index()
    {
        $user = Auth::user();
    }


    public function create(): Response
    {
        return Inertia::render('Users/Auth', [
            "user" => ["user" => ""],
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $myEvents = $user->events;

        $eventsParticipant = $user->eventAsParticipant;

        return view('users.dashboard', ['myevents' => $myEvents, 'eventsparticipant' => $eventsParticipant]);
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect('/users/auth');
    }

    public function show(User $user): Response
    {
        $user->load(['eventAsParticipant', 'events']);
        
        $user->load(['publications']);

        return Inertia::render('Users/Show', [
            'user' => $user,
            'userSession' => Auth::user(),
            'status' => session('status'),
        ]);
    }

    public function edit(String $id)
    {
        $user = User::where([
            ['id', $id],
            ])->first();
        return view('users.edit', ['user' => $user]);
    }

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

    public function destroy()
    {
        
    }
}
