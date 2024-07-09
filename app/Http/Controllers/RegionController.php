<?php

namespace App\Http\Controllers;

use App\Models\Region; // Asegúrate de importar el modelo
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regiones = Region::all();
        return response()->json($regiones);
    }
}
