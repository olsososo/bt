<?php

namespace App\Http\Middleware;

use Closure;

class LocaleMiddle
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
        echo 233;
        return $next($request);
    }
}
