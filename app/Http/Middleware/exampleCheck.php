<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class exampleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, int $isChecked)
    {
        // $isChecked = false;
        // if($isChecked>10){
        //     return redirect()-> route('login');
        // }

        return $next($request);
    }
}
