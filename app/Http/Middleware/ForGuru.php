<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // abort_if(Auth::user()->role_id != 2, 403);
        if(Auth::user()->role_id == 1){
            abort(403, 'Dapat diakses dari role guru');
        } else {
            abort_if(Auth::user()->role_id != 2 ,403);
        }
        return $next($request);
    }
}
