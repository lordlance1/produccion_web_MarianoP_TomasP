<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game; // <-- Añade esta línea
use App\Models\Categoria; // Si también necesitas la clase Categoria

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
        ]);

        Game::factory(1000)->create();    
    }
}

