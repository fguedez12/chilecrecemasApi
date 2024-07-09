<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('regions')->insert([
            ['id' => 1, 'nombre' => 'Arica y Parinacota'],
            ['id' => 2, 'nombre' => 'Tarapacá'],
            ['id' => 3, 'nombre' => 'Antofagasta'],
            ['id' => 4, 'nombre' => 'Atacama'],
            ['id' => 5, 'nombre' => 'Coquimbo'],
            ['id' => 6, 'nombre' => 'Valparaíso'],
            ['id' => 7, 'nombre' => 'Región del Libertador Gral. Bernardo O’Higgin'],
            ['id' => 8, 'nombre' => 'Región del Maule'],
            ['id' => 9, 'nombre' => 'Región de Ñuble'],
            ['id' => 10, 'nombre' => 'Región del Biobío'],
            ['id' => 11, 'nombre' => 'Región de la Araucanía'],
            ['id' => 12, 'nombre' => 'Región de Los Ríos'],
            ['id' => 13, 'nombre' => 'Región de Los Lagos'],
            ['id' => 14, 'nombre' => 'Región Aisén del Gral. Carlos Ibáñez del Camp'],
            ['id' => 15, 'nombre' => 'Región de Magallanes y de la Antártica Chilen'],
            ['id' => 16, 'nombre' => 'Región Metropolitana de Santiago'],
        ]);
    }
}
