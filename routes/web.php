<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSOController;

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

// Rutas para la autenticación SSO
Route::get('login/sso', [SSOController::class, 'redirectToProvider'])->name('sso.login');
Route::get('login/sso/callback', [SSOController::class, 'handleProviderCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

//Route::post('/login', [UserAuthController::class, 'login']);

// Otras rutas de tu aplicación
Route::get('/', function () {
    return view('welcome');
});
