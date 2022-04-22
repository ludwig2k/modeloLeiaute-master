<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class Login 
{
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure @next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {  
        session_start();

        if(isset($_SESSION['usuario'])){
            return $next($request);
        }
        return redirect()->route('login_index');

    }
    
}
