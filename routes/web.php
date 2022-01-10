<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\AbsenController;

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
    return view('welcome');
});

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//route admin
Route :: group (['prefix' => 'admin','middleware'=>['auth','role:admin']],
    function (){
        Route :: get ('/',function(){
            return 'halaman admin';
        });
        Route::get('profile', function(){
            return 'halaman profile admin';
        });
    });
        //member
        Route::group (['prefix' => 'member','middleware'=>['auth','role:member']],
        function (){
            Route::get('/',function(){
                return 'halaman member';
            });
            Route::get('profile', function(){
                return 'halaman profile member';
            });
        });

        Route :: group(['prefix' => 'admin', 'middleware' => ['auth']],function(){
            Route :: get('karyawan', function(){
                return view('karyawan.index');
            })->middleware(['role:admin']);

            Route :: get('absensi', function(){
                return view('absensi.index');
            })->middleware(['role:admin|member']);

            Route :: get('jabatan', function(){
                return view('jabatan.index');
            })->middleware(['role:admin']);

            Route :: get('gaji', function(){
                return view('gaji.index');
            })->middleware(['role:admin|member']);

            Route::resource('jabatan',JabatanController::class);
            Route::resource('karyawan',KaryawanController::class);
            Route::resource('absen',AbsenController::class);
            Route::resource('gaji',GajiController::class);

        });

