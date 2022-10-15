<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function authenticate(Request $request){
        
        $credentials = $request->validate([
            'username' => ['required', 'exists:users,username'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role->role == 'administrator'){
                return redirect('/admin/dashboard');
            }
            else if (Auth::user()->role->role == 'guru'){
                return redirect('/guru/dashboard');
            }
            else if (Auth::user()->role->role == 'siswa'){
                return redirect('/siswa/dashboard');
            }
        }
    }   

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
