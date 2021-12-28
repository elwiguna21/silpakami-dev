<?php

namespace App\Http\Middleware;
use Closure;
use Sentinel;

class TeknisiMiddleware
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
        // dd(Sentinel::getUser()->roles()->first()->slug);
        //1. user should be authenticated
        //2. user authenticated should be an admin
        // dd(Sentinel::getUser()->roles()->first()->slug);
        if (Sentinel::check()){

            if (Sentinel::getUser()->roles()->first()->slug == 'teknisi_aplikasi' OR Sentinel::getUser()->roles()->first()->slug == 'teknisi_jaringan'){
                return $next($request); 
            }else{
                return redirect('/');
            }
        }           
        else 
           return redirect('/');   
    }
}