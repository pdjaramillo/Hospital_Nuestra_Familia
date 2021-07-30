<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
/*
class Administrador
{
  
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check())
        return redirect('login');

        switch(auth::user()->rol_id){
            case(1):
                return $next($request);
                break;

            case(2):
                 return redirect('clientes');
                break;

            case(3):
                return redirect('medicos');
                break;
        }
    }
}
*/