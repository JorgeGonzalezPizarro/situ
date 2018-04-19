<?php

namespace App\Http\Middleware;

use App\Invitados;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Sentinel;

class SentinelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Sentinel::guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 403);
            } else {
//                return redirect()->guest('login');
            }
        }


        if(Sentinel::check() && Sentinel::inRole('Admin')){
                return redirect('Admin\adminDashboard');
            }
            elseif  (Sentinel::check() && Sentinel::inRole('Alu')) {
                return redirect('Alumno\alumnoDashboard');
            }
        elseif  (Sentinel::check() && Sentinel::inRole('Inv')) {


                return redirect('Situ\public');


        }
        elseif  (Sentinel::check() && Sentinel::inRole('Prof')) {

                return redirect('Situ\public');


        }

        return $next($request);
    }
}

