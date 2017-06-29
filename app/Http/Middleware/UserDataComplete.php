<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserDataComplete
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
        if(	Auth::user()->isComplete() )
            return $next($request);
        else {
            return redirect()->route('myprofile')
                             ->with('msg', 'Lengkapi data Anda.');
        }
    }
}
