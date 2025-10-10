<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        //if auth false then redirect login page
        if(!auth()->check()){
            return redirect()->route('login');
        }

        //check auth user role not includes roles
        if(!in_array(auth()->user()->role, $roles)){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
