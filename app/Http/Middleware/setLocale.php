<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class setLocale
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
        //neu co request lang
        if($lang=$request->lang){
            \Session::put('lang', $lang);
        }

        //new co session lang
        if($lang=session('lang')){
            App::setLocale($lang);
        }

        return $next($request);
    }
}
