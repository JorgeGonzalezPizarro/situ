<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;
use Session;
use Carbon;
class Invitado
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
        $user = Sentinel::getUser();
        if ($user->roles()->first()->slug == 'Inv') {
            $inviado = $user->invitado()->get()->first();

            if (Sentinel::check() && (Sentinel::inRole('Inv') || Sentinel::inRole('Prof')) && $inviado->fecha_limite < (Carbon::now()->toDateString())) {
                return redirect('/loginInv');

            } else {
                return $next($request);


            }
        }

        else{

                return $next($request);


            }
        }
    }
