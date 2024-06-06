<?php

use App\Http\Controllers\ControllerKaryawan;
use App\Http\Controllers\ControllerPresense;
use App\Http\Controllers\ControllerUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ControllerUser::class, 'home']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [ControllerUser::class, 'loginpg'])->name('login');
    Route::post('/login', [ControllerUser::class, 'login']);
    Route::get('/register', [ControllerUser::class, 'registerpg']);
    Route::post('/register', [ControllerUser::class, 'register']);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ControllerUser::class, 'dashboard']);
    Route::get('/logout', [ControllerUser::class, 'logout']);

    Route::middleware('administrator')->group(function () {
        // CRUD Karyawan
        Route::get('/karyawan', [ControllerKaryawan::class, 'page']);
        Route::get('/karyawan/create', [ControllerKaryawan::class, 'createpg']);
        Route::post('/karyawan/create', [ControllerKaryawan::class, 'create']);
        Route::get('/karyawan/update/{id}', [ControllerKaryawan::class, 'updatepg']);
        Route::post('/karyawan/update/{id}', [ControllerKaryawan::class, 'update']);
        Route::get('/karyawan/delete/{id}', [ControllerKaryawan::class, 'confirm']);
        Route::post('/karyawan/delete/{id}', [ControllerKaryawan::class, 'delete']);
        // CRUD Presence
        Route::get('/presence', [ControllerPresense::class, 'page']);
        Route::get('/presence/create', [ControllerPresense::class, 'createpg']);
        Route::post('/presence/create', [ControllerPresense::class, 'create']);
        Route::get('/presence/update/{id}', [ControllerPresense::class, 'updatepg']);
        Route::post('/presence/update/{id}', [ControllerPresense::class, 'update']);
        Route::get('/presence/delete/{id}', [ControllerPresense::class, 'confirm']);
        Route::post('/presence/delete/{id}', [ControllerPresense::class, 'delete']);
    });
});
