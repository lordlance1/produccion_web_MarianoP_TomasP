<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota; // <-- Añade esta línea
use App\Models\Categoria; // Si también necesitas la clase Categoria

class DeleteMascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
            Mascota::truncate();
        }
    }

