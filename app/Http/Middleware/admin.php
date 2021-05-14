<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class admin
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
        
        if (!Auth::user()->admin) {

            notify()->warning('you have no permiisions to perform this');
            
           return redirect()->back();
        }

        return $next($request);
    }
}
