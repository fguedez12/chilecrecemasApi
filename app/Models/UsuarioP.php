<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UsuarioP extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuariop';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'password',
        'edad',
        'region_id',
        'comuna_id',
    ];
    
    public static $rules = [
        'email' => 'required|email|unique:usuariop,email', // Asegura que el campo email sea único en la tabla usuariop
        // Otros campos y reglas de validación
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con UsuarioFamiliar
     */
    public function familiares()
    {
        return $this->hasMany(UsuarioFamiliar::class, 'usuarioP_id');
    }
}
