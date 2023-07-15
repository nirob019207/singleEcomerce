<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
class CheckAdminType
{




    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype == 1) {
            return $next($request);
        }

        // Handle the case when the user is not authenticated or doesn't have the required user type
        // For example, redirect to a specific page or display an error message
        return redirect()->route('login');
    }
}


