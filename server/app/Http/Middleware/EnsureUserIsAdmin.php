<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

/**
 * This is a middleware which checks if the user is SUPERADMIN IN ROLE.
 * If The USER IS SUPERADMIN
 * It will proceed
 * Otherwise redirects back to the previous app location
 */
class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //$user = Auth::user();

        //$userSpKey = $user->special_status;

        /*

        if ($userSpKey != "superadmin") {
            //return redirect('/home');

            return back();
        }

        */

        if (Auth::user()->special_status != 'superadmin') :
            return back();
        endif;


        return $next($request);
    }
}
