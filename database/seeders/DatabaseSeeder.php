<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Sí importa el orden en que se coloquen aquí
        $this->call(PaisesNacionalidadesSeeder::class);
        $this->call(CatSexoSeeder::class);
        $this->call(SepomexSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(AlumnoEjemploSeeder::class);
        $this->call(EjemploSeeder::class);
    }
}
