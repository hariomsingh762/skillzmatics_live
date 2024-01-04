<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('ADMIN_LOGIN') ) {
            
            // if(session()->has('ADMIN_LOGIN') && ($request->path() == 'admin-login') ){
                
            //     return redirect('/home');
            // } 

            return $next($request); 
        } else {
            $request->session()->flash('error', 'Access Denied');
            return redirect('/admin-login');
        }
    }
}



