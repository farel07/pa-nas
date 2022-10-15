<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekStatus
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
        $user = Auth::user();
        if ($user->role->role == 'administrator') {
            return redirect('/admin/dashboard');
        } else if ($user->role->role == 'guru') {
            return redirect('/guru/dashboard');
        } else if ($user->role->role == 'siswa') {
            return redirect('/guru/dashboard');
        }
        
        return $next($request);
    }
}
