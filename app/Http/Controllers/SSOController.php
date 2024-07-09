<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Auth;

class SSOController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function handleProviderCallback()
    {
        $azureUser = Socialite::driver('microsoft')->user();

        // Obtener el rol del usuario desde el sistema SSO
        $role = $this->getRoleFromAzureUser($azureUser);

        // Lógica para autenticar al usuario en tu aplicación
        $user = UserAdmin::firstOrCreate([
            'email' => $azureUser->getEmail(),
        ], [
            'name' => $azureUser->getName(),
            'microsoft_id' => $azureUser->getId(),
            'avatar' => $azureUser->getAvatar(),
            'role' => $role,
        ]);

        Auth::login($user, true);

        return redirect()->route('admin.dashboard');
    }

    private function getRoleFromAzureUser($azureUser)
    {
        $role = 'default_role'; // Asigna un rol por defecto si no se encuentra otro.

        if (isset($azureUser->user['roles']) && count($azureUser->user['roles']) > 0) {
            $role = $azureUser->user['roles'][0]; // Supone que el primer rol es el correcto.
        }

        return $role;
    }
}
