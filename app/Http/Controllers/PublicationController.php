<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Publication;
use App\Models\User;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'store'
        ]);
    }
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request):RedirectResponse
    {
        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $imageExtension = $request->file('image')->extension();

            $imageName = md5($request->file('image')->getClientOriginalName() . strtotime('now'));

            $request->file('image')->move(storage_path('/app/public/publications'), "$imageName.$imageExtension");

            $image = "/storage/app/public/publications/$imageName.$imageExtension";
        }else if($request->image != '' && $request->hasFile('image') && !$request->file('image')->isValid()){
            session()->flash('status', ['error' => 'Imagem Inválida']);
            return redirect()->back();
        }

        $user = Auth::user();

        Publication::create(array_merge($request->all(), ['image' => $image, 'user_id' => $user->id]));
        
        session()->flash('status', ['okay' => 'Publicação Criada com Sucesso!']);
        return redirect()->back();
    }

    public function show(string $id)
    {
   
    }

    public function edit(string $id)
    {
        
    }

  
    public function update(Request $request, string $id)
    {
    
    }

    public function destroy(string $id)
    {
    }
}
