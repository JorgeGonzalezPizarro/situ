<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class Admin
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
        /*Chequeo si es Admin*/
        if (Sentinel::check() && Sentinel::inRole('Admin')) {

            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
