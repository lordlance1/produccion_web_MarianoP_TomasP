<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria1 = Categoria::create([
            'nombre' => 'Shooters',
            'descripcion' => 'Juegos de disparos en primera o tercera persona',
        ]);

        $categoria2 = Categoria::create([
            'nombre' => 'RPG',
            'descripcion' => 'Juegos de rol donde los jugadores asumen personajes',
        ]);

        $categoria3 = Categoria::create([
            'nombre' => 'Plataformas',
            'descripcion' => 'Juegos con desplazamiento en niveles y obstáculos',
        ]);

        $categoria4 = Categoria::create([
            'nombre' => 'Deportes',
            'descripcion' => 'Juegos que simulan deportes reales o ficticios',
        ]);

        $categoria5 = Categoria::create([
            'nombre' => 'Aventura',
            'descripcion' => 'Juegos con exploración y resolución de misiones',
        ]);

        $categoria6 = Categoria::create([
            'nombre' => 'Puzzle',
            'descripcion' => 'Juegos que requieren resolver problemas o acertijos',
        ]);

        $categoria7 = Categoria::create([
            'nombre' => 'Estrategia',
            'descripcion' => 'Juegos que requieren planificación y tácticas',
        ]);
    }
}