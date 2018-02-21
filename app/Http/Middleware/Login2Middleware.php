<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Login2Middleware
{
    /**
     * 后台管理员登录中间件.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if ($request->session()->has('sid')){
          return $next($request);
        }else{
         return redirect('/auth/login2/login');
        }

        
        
    }
}
