<?php

use App\Models\User;
use App\Models\Kelas;
use App\Models\Nilai_Siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataNilaiSiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NamaPenilaianController;
use App\Http\Controllers\NilaiSiswaController;
use App\Models\Mapel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
})->middleware('guest');

Route::get('/home', function () {
    return view('dashboard.layout.new_main');
});

// admin routes
Route::middleware(['admin', 'auth'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::prefix('/master')->group(function () {
        // user ==================================================================
        Route::get('/user/siswa', [UserController::class, 'siswa']);
        Route::get('/user/siswa/create_siswa', [UserController::class, 'create_siswa']);
        Route::get('/user/guru', [UserController::class, 'guru']);
        Route::get('/user/guru/create_guru', [UserController::class, 'create_guru']);
        Route::resource('/user', UserController::class);

        // kelas =================================================================
        Route::resource('/kelas', KelasController::class);
        Route::resource('/mapel', MapelController::class);

        // mapel =================================================================
        Route::get('/list_mapel', [MapelController::class, 'index2']);
        Route::get('/kelas_mapel/{id}', [MapelController::class, 'show2']);
        Route::get('/kelas_mapel/create/{id}', [MapelController::class, 'add_mapel_at_class']);
        Route::post('/kelas_mapel', [MapelController::class, 'store_mapel_at_class']);
        Route::delete('/kelas_mapel/{id}', [MapelController::class, 'destroy_mapel_at_class']);
        Route::get('/kelas_mapel/assign/{id}', [MapelController::class, 'assign_guru_to_mapel']);
        Route::put('/kelas_mapel/assign/{id}', [MapelController::class, 'assign_guru_kelas_mapel']);
        Route::put('/kelas_mapel/unassign/{id}', [MapelController::class, 'unassign_guru_kelas_mapel']);
    });

    // Route::prefix('/data')->group(function (){
    //     Route::get('/siswa', function(){
    //         return 'master/siswa';
    //     });
    //     Route::get('/guru', function(){
    //         return 'master/guru';
    //     });
    //     Route::get('/kelas', function(){
    //         return 'master/kelas';
    //     });
    //     Route::get('/mapel', function(){
    //         return 'master/mapel';
    //     });
    // });

});

// guru routes
Route::middleware(['guru'])->prefix('/guru')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'index']);
    Route::prefix('/penilaian')->group(function () {

        Route::get('/nama_nilai', [NamaPenilaianController::class, 'index_kelas']);
        Route::get('/nama_nilai/{id}', [NamaPenilaianController::class, 'list_mapel']);

        // ajax
        Route::get('/nama_nilai/mapel_kelas/{id}', [NamaPenilaianController::class, 'show_nama_penilaian']);
        Route::get('/nama_nilai/mapel_kelas/{id}/create', [NamaPenilaianController::class, 'create_nama_penilaian']);
        Route::resource('/nama_nilai/mapel_kelas', NamaPenilaianController::class);
        Route::get('/nilai_siswa/nama_nilai/{id}', [NilaiSiswaController::class, 'select_nama_nilai']);
        Route::get('/data_nilai_siswa/{id}/show_nama_nilai', [DataNilaiSiswaController::class, 'show_nama_penilaian']);

        // penilaian siswa
        Route::get('/nilai_siswa', [NilaiSiswaController::class, 'index_kelas']);
        Route::get('/nilai_siswa/{id}', [NilaiSiswaController::class, 'create']);

        // 
        Route::get('/data_nilai_siswa', [DataNilaiSiswaController::class, 'index']);
        Route::get('/data_nilai_siswa/{id}', [DataNilaiSiswaController::class, 'show_penilaian']);
        Route::get('/data_nilai_siswa/nilai_siswa/{id}/edit', [DataNilaiSiswaController::class, 'edit_nilai']);
        Route::put('/data_nilai_siswa/{id}', [DataNilaiSiswaController::class, 'update_nilai']);

        Route::post('/nilai_siswa', [NilaiSiswaController::class, 'store']);
    });
});

// siswa routes
Route::middleware(['siswa'])->prefix('/siswa')->group(function () {
    Route::get('/dashboard', function () {
        return 'hi';
    });
});

// auth route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dokumentasi', function () {
    return view('dokumentasi', [
        'users' => User::all(),
        'nilai' => Nilai_Siswa::all(),
        'kelas' => Kelas::find(1)
    ]);
});
