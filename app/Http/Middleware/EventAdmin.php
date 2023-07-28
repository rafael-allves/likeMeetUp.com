<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;


class EventAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->id != $request->event->user_id){
            session()->flash('status', ['error' => 'Você Não Tem Permissão de Modificar Esse Evento']);
            return redirect()->back();
        }

        return $next($request);
    }
}
