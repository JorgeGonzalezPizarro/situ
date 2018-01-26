<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 26/01/2018
 * Time: 12:06
 */

use Closure;
use Sentinel;

class SentinelUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next) {
        $user=Auth::user;
        Sentinel::login($user);
        if (Sentinel::check()) {
            return $next($request);
        } else {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
    }
}