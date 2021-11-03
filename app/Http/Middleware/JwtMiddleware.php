<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Session;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                Session::flash('error', 'Token is Invalid');
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                Session::flash('error', 'Token is Expired');
            }else{
                Session::flash('error', 'Authorization Token not found');
            }

            // abort(403);

            return error_log($e);
            // Session::flash('error', $e);

            // return redirect()->route('login');
        }

        return $next($request);
    }
}
