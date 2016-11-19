<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

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
        var_dump($request->server('HTTP_ACCEPT_LANGUAGE'));
        
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        }
        
        App::setLocale($locale);
        return $next($request);
    }
}
