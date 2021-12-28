<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class UserMiddleware
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
        //1. user should be authenticated
        //2. user authenticated should be an admin
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user'){
            return $next($request);
            // \Log::info('role', ['role' => Sentinel::getUser()->roles()->first()]);  
            }           
        else 
           return redirect('/');
    }
}
