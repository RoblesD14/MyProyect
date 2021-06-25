<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::firstOrCreate(['nombre'=>'Limpieza']);
        $categoria = Categoria::firstOrCreate(['nombre'=>'Carpintería']);
        $categoria = Categoria::firstOrCreate(['nombre'=>'Lavandería']);
    }
}
