<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        // dd($request);
        // !Auth::guard('guru')->check()
        // if(!$request->session()->has('loggedAdmin')){
        //     return back()->with("tembak","Not Authorized");
        // }
        if(!Auth::guard('admin')){
            return back()->with("tembak","Not Authorized");
        }
        return $next($request);
    }
}
