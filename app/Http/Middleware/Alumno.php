<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Session;
use Redirect;
class Alumno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check() && Sentinel::inRole('Alu')) {

            return $next($request);
        }
        else{

            Session::flash('permission', "Acceso denegado!");

            return Redirect::back();        }
    }
}
