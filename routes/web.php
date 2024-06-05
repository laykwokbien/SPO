<?php

use App\Http\Controllers\ControllerUser;
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
    Route::get('/login', [ControllerUser::class, 'loginpg']);
    Route::post('/login', [ControllerUser::class, 'login']);
    Route::get('/register', [ControllerUser::class, 'registerpg']);
    Route::post('/register', [ControllerUser::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ControllerUser::class, 'dashboard']);
});