<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Sentinel;

class AuthVerification
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (!Sentinel::check())
        {
            return redirect()->intended('auth');
        }
        else
        {
            return $next($request);
        }

    }

}
