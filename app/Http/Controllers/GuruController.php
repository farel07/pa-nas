<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user(),
            'title' => 'Dashboard Guru'
        ];
        return view('dashboard.guru.index', $data);
    }
}
