<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\User;

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
        //pegando a imagem
        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));

            //adicionando a questão do timestamp pra ter maior certeza de q esse nome de imagem será único! E não será sobrescrita por esse ou outro usuário!
            //Função md5 criptografa o path da imagem pra salvar na db


            $request->image->move(storage_path('/app/public/events'), $imageName . '.' . $extension);

            $image = "storage/events/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }else{
            return redirect()->back()->withInput()->withErrors(['image' => 'O campo de imagem está incorreto.']);
        }
        
        $user = Auth::user(); //Pegando o usuário logado que fez a request pelo browser
        Event::create(array_merge([$request, 'image' => $image, 'user_id' => $user->id]));
        //mandando armazenar o dono do evento e a imagem!

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first();

        return view('events.show', ['event' => $event, 'dono' => $eventOwner]);
    }

    public function edit($id){
        $event = Event::findOrFail($id);

        $user = Auth::user();

        if($user->id != $event->user_id)return redirect('/dashboard');

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event){
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::delete('public/events/' . explode('storage/events/', $event->image)[1]);

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now'));

            $request->image->move(storage_path('/app/public/events'), $imageName . '.' . $extension);

            $data['image'] = "storage/events/" . $imageName . '.' . $extension; //Salvando a imagem como uma string encriptografada
        }elseif($request->hasFile('image') && !$request->file('image')->isValid()){
            return redirect()->back()->withInput()->withErrors(['image' => 'O campo de imagem está incorreto.']);
        }

        $data['items'] = json_encode($request->input('items', [])); // Converte o array em uma string JSON

        $event->update($data);

        return redirect('/dashboard')
        ->with('msg', 'Evento Editado Com Sucesso!');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);

        Storage::delete('public/events/' . explode('storage/events/', $event->image)[1]);
        //Na minha db eu guardo o caminho todo do storage ate o nome da imagem, por isso preciso separar oq n qro com o explode(SEMELHANTE AO SPLIT)

        $event->delete();

        return redirect('/dashboard')
        ->with('msg', 'Evento Deletado Com Sucesso!');
    }

    public function joinEvent($id){
        $user = Auth::user();

        if (!$user->eventAsParticipant()->where('event_id', $id)->exists()){
            $user->eventAsParticipant()->attach($id); //Se n entender va na model do user q vai ta la
            return back()->with('msg', 'Sua Presença foi Confirmada!');
        }

        return back()->with('msg', 'Você já confirmou presença nesse evento');

    }
    public function leaveEvent($id){
        $user = Auth::user();
        $user->eventAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return back()->with('msg', 'Você saiu com sucesso do ' . $event->title);
    }
}
