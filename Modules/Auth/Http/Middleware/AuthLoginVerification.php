<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Sentinel;

class AuthLoginVerification
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Sentinel::check())
        {
            $role = Sentinel::getUser()->roles()->first()->slug;

            if ($role == 'admin')
            {
                return redirect()->intended('home');
            }
            else
            {
                return redirect()->intended('phonebook');
            }
        }
        else
        {
            return $next($request);
        }

    }

}
