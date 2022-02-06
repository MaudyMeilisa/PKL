<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LaporanController;


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
    return view('auth.login');
});

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login-karyawan', [KaryawanController::class, 'login'])->name('loginKaryawan');
Route::post('/login-karyawan', [KaryawanController::class, 'loginStore'])->name('loginKaryawan');



// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
//     function () {
//         Route::get('admin', function () {
//             return view('admin.index');
//         })->middleware(['role:admin|member']);
//         Route::resource('users', UserController::class);
//         Route::resource('karyawan', KaryawanController::class);
//         Route::resource('jabatan', JabatanController::class);
//         Route::resource('absen', AbsenController::class);
//         Route::resource('gaji', GajiController::class);

//         Route::get('laporan', [GajiController::class, 'laporan'])->name('laporan');
//     });

// Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member|admin']],
//     function () {

//         Route::get('member', function () {
//             return view('member.index');
//         })->middleware(['role:member']);
//         Route::resource('gaji', GajiController::class);
//         Route::get('laporan', [GajiController::class, 'laporan'])->name('laporan');
//     });



//route admin
Route::group(['prefix' => 'penggajian', 'middleware' => ['auth', 'role:admin|member']],
    function () {
        Route::get('/', function () {
            return view('jabatan.index');
        })->middleware(['role:admin']);

        Route::get('/', function () {
            return view('karyawan.index');
        })->middleware(['role:admin']);

        Route::get('/', function () {
            return  view('absen.index');
        })->middleware(['role:admin|member']);

        Route::get('/', function () {
            return view('gaji.index');
        })->middleware(['role:admin|member']);

        Route::get('/', function () {
            return view('admin.laporan.index');
        })->middleware(['role:admin|member']);

        Route::resource('jabatan', JabatanController::class);
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('absen', AbsenController::class);
        Route::resource('gaji', GajiController::class);
        Route::resource('laporan', LaporanController::class);
    });
