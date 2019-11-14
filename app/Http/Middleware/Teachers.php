<?php

namespace App\Http\Middleware;

use Closure;

class Teachers
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
        if(auth()->user()->roleId == 2 || auth()->user()->roleId == 4){
            return $next($request);
        }
        return redirect('home')->with('error','You dont have parent access');
    }
}
