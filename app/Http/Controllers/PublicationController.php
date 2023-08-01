<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use Illuminate\Http\RedirectResponse;
use Inertia\Response;


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
