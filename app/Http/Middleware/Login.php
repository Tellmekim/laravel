<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		 //检验csrf
		 if($userinfo = $request->session()->get('userinfo')){
			$request->attributes->add(['userinfo'=>$userinfo]);//添加参数
		 }
         return $next($request);
    }
}
