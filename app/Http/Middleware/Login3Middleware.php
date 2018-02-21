<?php

namespace App\Http\Middleware;

use Closure;

class Login3Middleware
{
    /**
     * 商家登录中间件.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if ($request->session()->has('shopname')){
          return $next($request);
        }else{
         return redirect('/auth/login3/login');
        }

    }
}
