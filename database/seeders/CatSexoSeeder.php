<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatSexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserción de valores para catálogo de sexos
        DB::table('cat_sexos')->insert([
            'descripcion' => 'Hombre'
        ]);

        DB::table('cat_sexos')->insert([
            'descripcion' => 'Mujer'
        ]);

        DB::table('cat_sexos')->insert([
            'descripcion' => 'No definido'
        ]);

        DB::table('cat_sexos')->insert([
            'descripcion' => 'Otro'
        ]);
    }
}
