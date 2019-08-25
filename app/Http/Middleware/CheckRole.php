<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $args=func_get_args();
        unset($args[0], $args[1]);
        $args = array_values($args);

        if(auth()->user()->hasRole($args)){
            return $next($request);
        }else{
//            return redirect('admin/product');
        }
    }
}
