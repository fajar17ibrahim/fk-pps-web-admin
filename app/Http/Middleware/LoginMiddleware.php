<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            Session::flash('error', 'Anda tidak punya akses! Silahkan Login');
            return redirect('login');
        }
        $user = Auth::user();

        // if($user->level == $roles)
            return $next($request);

        // Session::flash('error', 'Anda tidak punya akses! Silahkan Login');
        // return redirect('login');
    }
}
