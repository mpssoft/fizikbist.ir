<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserInfoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(auth()->user()->name == 'کاربر جدید'){
                alert('','لطفا برای استفاده از سایت اطلاعات خود را تکمیل کنید.','warning');
                return redirect("/user/edit");
            }
        }
        return $next($request);
    }
}
