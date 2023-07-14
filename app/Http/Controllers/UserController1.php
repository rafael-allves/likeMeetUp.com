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
}
