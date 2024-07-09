<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\UsuarioP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialAuthController extends Controller
{
    // Redirigir a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Obtener información de Google
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $authUser = $this->_registerOrLoginUser($user);
            $token = $authUser->createToken('MyAppToken')->plainTextToken;
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error during Google login'], 500);
        }
    }

    // Redirigir a Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    // Obtener información de Facebook
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $authUser = $this->_registerOrLoginUser($user);
            $token = $authUser->createToken('MyAppToken')->plainTextToken;
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Facebook Login Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error during Facebook login'], 500);
        }
    }

    // Registro o Login del Usuario
    protected function _registerOrLoginUser($data)
    {
        $user = UsuarioP::where('email', $data->email)->first();

        if (!$user) {
            $user = UsuarioP::create([
                'nombres' => $data->name,
                'email' => $data->email,
                'password' => bcrypt('default_password'), // Puedes cambiar esto según tus necesidades
                // Otros campos necesarios
            ]);
        }

        Auth::login($user);

        return $user;
    }
}
