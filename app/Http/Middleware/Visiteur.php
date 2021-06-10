<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Visiteur
{
    /**
     * Handle an incoming request restricted to Visiteur
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if($user && $user->role->libelle == 'Visiteur'){
            return $next($request);
        }
        return redirect()->route('welcome')->with('warning','Vous n\'avez pas le droit d\'accéder à cette page !');
    }
}
