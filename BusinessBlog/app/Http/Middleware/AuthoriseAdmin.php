<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthoriseAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user')){
            if(session()->get('user')->roles_id == 2){
                return $next($request);
            }
            else{
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('home');
        }

    }
}
