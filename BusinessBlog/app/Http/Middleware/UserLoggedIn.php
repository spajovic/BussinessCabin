<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user')){
            return $next($request);
        }
        else{
            return redirect()->back(401);
        }

    }
}
