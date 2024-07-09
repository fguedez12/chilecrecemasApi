<?php

namespace App\Http\Controllers;

use App\Models\UsuarioP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class UsuarioPAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Registra todos los datos de la solicitud para depuración
        Log::info('Datos recibidos:', $request->except('password'));
    
        // Busca el usuario por email
        $user = UsuarioP::where('email', $request->email)->first();
    
        // Verifica si el usuario existe y la contraseña es correcta
        if (!$user || !Hash::check($request->password, $user->password)) {
            Log::info('Intento de inicio de sesión fallido para el email: ' . $request->email);
            return response()->json([
                'message' => 'Las credenciales proporcionadas son incorrectas.'
            ], 422);
        }
    
        // Genera un token personalizado para el usuario
        $token = $user->createToken('MyAppToken')->plainTextToken;
    
        return response()->json(['token' => $token], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:usuariop,email', // Corregido para usar 'usuariop'
            'password' => 'required|min:6|confirmed',
            'edad' => 'required|integer',
            'region_id' => 'required|integer',
            'comuna_id' => 'required|integer',
        ]);

        // Crea un nuevo usuario
        $usuario = UsuarioP::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'edad' => $request->edad,
            'region_id' => $request->region_id,
            'comuna_id' => $request->comuna_id,
        ]);

        // Genera un token para el nuevo usuario
        $token = $usuario->createToken('MyAppToken')->plainTextToken;

        return response()->json(['usuario' => $usuario, 'token' => $token], 201);
    }
}
