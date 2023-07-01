<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    $events = Event::all();
    public function index(){
        return view('welcome', ['events' => $events]);
    }
    public function create(){
        return view('events.create');
    }
}
