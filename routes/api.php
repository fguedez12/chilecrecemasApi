<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioPAuthController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\SocialAuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UsuarioPAuthController::class, 'login']);
Route::post('/register', [UsuarioPAuthController::class, 'register']);

Route::get('/regiones', [RegionController::class, 'index']);
Route::get('/regiones/{id}/comunas', [ComunaController::class, 'index']);

/*rutas para redes sociales*/
Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
Route::get('login/facebook', [SocialAuthController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);
