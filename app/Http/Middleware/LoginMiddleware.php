<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LoginMiddleware
{
    /**
     * 前台食客登录中间件.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
        	return redirect('/home/login');
        }

        return $next($request);
    }
}
