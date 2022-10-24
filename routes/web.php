<?php

use App\Models\User;
use App\Models\Kelas;
use App\Models\Nilai_Siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;

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
        Route::get('/user/siswa', [UserController::class, 'siswa']);
        Route::get('/user/siswa/create_siswa', [UserController::class, 'create_siswa']);
        Route::get('/user/guru', [UserController::class, 'guru']);
        Route::get('/user/guru/create_guru', [UserController::class, 'create_guru']);
        Route::resource('/user', UserController::class);
        Route::resource('/kelas', KelasController::class);
        Route::resource('/mapel', MapelController::class);
        Route::get('/list_mapel', [MapelController::class, 'index2']);
        Route::get('/kelas_mapel/{id}', [MapelController::class, 'show2']);
        Route::get('/kelas_mapel/create/{id}', [MapelController::class, 'add_mapel_at_class']);
        Route::post('/kelas_mapel', [MapelController::class, 'store_mapel_at_class']);
        Route::delete('/kelas_mapel/{id}', [MapelController::class, 'destroy_mapel_at_class']);
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
    Route::get('/dashboard', function () {
        return 'hi';
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
