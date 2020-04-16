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
      if(\Auth::check() && strstr($request->route()->getPrefix(),"dashboard") && \Auth::user()->is_superAdmin != 1){
            return redirect()->route('logout');
            exit;
        } else {
            return $next($request);
        }
      }

    }
