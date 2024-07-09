<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioFamiliar extends Model
{
    use HasFactory;

    protected $table = 'usuario_familiars'; // Asegúrate de que coincida con la tabla de la migración

    protected $fillable = [
        'usuarioP_id',
        'nombres',
        'apellidos',
        'edad',
        'sexo',
        'fecha_nacimiento',
        'semanas_embarazo',
        'parentesco',
    ];

    // Relación con UsuarioP
    public function usuario()
    {
        return $this->belongsTo(UsuarioP::class, 'usuarioP_id');
    }
}
