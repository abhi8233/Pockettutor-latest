<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            /* if (Auth::guard($guard)->check()) {
                 return redirect(RouteServiceProvider::HOME);
            }*/
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role; 
                /* if change redirection then change in login controller */
                switch ($role) {
                    case 'SuperAdmin':
                        return redirect('/admin/dashboard');
                        break;
                    case 'Tutor':
                        return redirect('/tutor/dashboard');
                        break; 
                    case 'Student':
                        /* return redirect('/student/dashboard'); */
                        return redirect('/student/booking');
                        break; 
                    default:
                        return redirect('/home'); 
                        break;
                }
            }
        }

        return $next($request);
    }
}
