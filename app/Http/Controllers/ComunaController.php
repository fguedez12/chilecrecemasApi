<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    public function index($regionId)
    {
        // Validar que el regionId es un entero
        if (!is_numeric($regionId)) {
            return response()->json(['message' => 'Invalid region ID'], 400);
        }

        // Buscar comunas que pertenecen a la región
        $comunas = Comuna::where('region_id', $regionId)->get();

        // Verificar si se encontraron comunas
        if ($comunas->isEmpty()) {
            return response()->json(['message' => 'No comunas found'], 404);
        }

        return response()->json($comunas);
    }
}