<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(\Route::currentRouteName() != 'login'){
        if (\Auth::user()->type != 'admin') {
            return redirect()->route('logout');
            exit;
        } else {
            return $next($request);
        }
      }

    }
}
