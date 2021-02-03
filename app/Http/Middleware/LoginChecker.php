<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginChecker
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
            # Tying to optimise the code for several role checks e.g admin,player,scout,mascot etc.
            # Instead of creating middlewares for each
        // if (auth()-user()->role->name !== 'admin'){
        //     return redirect()->route('login');
        // }

        return $next($request);
    }
}
