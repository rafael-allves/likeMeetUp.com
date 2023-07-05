<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Event;
use App\Models\User;

use Exception;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $events = Event::where([
                ['title', 'like', '%' . $search . '%'],
            ])->get();

        }else{
            $events = Event::all();
        }


        return view('welcome', ['events' => $events, 'search' => $search]);
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

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));

            //adicionando a questão do timestamp pra ter maior certeza de q esse nome de imagem será único! E não será sobrescrita por esse ou outro usuário!
            //Função md5 criptografa o path da imagem pra salvar na db


            $request->image->move(storage_path('/app/public/events'), $imageName . '.' . $extension);

            $event->image = "storage/events/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }else{
            return redirect()->back()->withInput()->withErrors(['image' => 'O campo de imagem está incorreto.']);
        }
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        $user = auth()->user(); //Pegando o usuário logado que fez a request pelo browser
        $event->user_id = $user->id; //mandando armazenar o dono do evento

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()['name'];

        return view('events.show', ['event' => $event, 'dono' => $eventOwner]);
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request){
        $event = Event::findOrFail($request->id);
        $data = $request->all();

        Storage::delete($event->image);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));

            $request->image->move(storage_path('/app/public/events'), $imageName . '.' . $extension);

            $data['image'] = "storage/events/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }else{
            return redirect()->back()->withInput()->withErrors(['image' => 'O campo de imagem está incorreto.']);
        }

        $event->update($data);

        return redirect('/dashboard')
        ->with('msg', 'Evento Editado Com Sucesso!');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);

        Storage::delete($event->image);

        $event->delete();

        return redirect('/dashboard')
        ->with('msg', 'Evento Deletado Com Sucesso!');
    }
}
