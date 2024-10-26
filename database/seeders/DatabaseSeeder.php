<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota; // <-- Añade esta línea
use App\Models\Categoria; // Si también necesitas la clase Categoria

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        CategoriaSeeder::class

      ]);
Mascota::factory(1000)->create();    
    }
}
