<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }
    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        //pegando a imagem

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() + strtotime('now') + '.' + $extension);

            //adicionando a questão do timestamp pra ter maior certeza de q esse nome de imagem será único! E não será sobrescrita por esse ou outro usuário!
            //Função md5 criptografa o path da imagem pra salvar na db


            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName; //Salvando a imagem como uma string encriptografada
        }

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
}
