<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai_Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'nilai' => Nilai_Siswa::all(),
            'siswa' => User::where('role_id', 3)->get(),
            'mapel' => Mapel::all(),
            'guru' => User::where('role_id', 2)->get(),
            'kelas' => Kelas::all(),
            'title' => 'Dashboard Admin',
            'user' => auth()->user()
        ];

        return view('dashboard.index', $data);
    }
}
