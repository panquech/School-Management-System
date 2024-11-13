<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class AlumnoEjemploSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserción de un aspirante de ejemplo
        $user_id = DB::table('users')->insertGetid([
            'name' => 'Juan Carlos Guillermo',
            'apellido1' => 'Farias',
            'apellido2' => 'Martinez',
            'email' => 'jcgfm44@yahoo.com.mx',
            'email_verified_at' => Carbon::now(),
            'confirmado' => 1,
            'password' => MD5('12345678'),
            'codigo_confirmacion' => Str::random(25),
            'ruta_imagen' => null
        ]);

        DB::table('alumnos')->insert([
            'nombre_artistico' => 'Memo Farias',
            'fecha_nacimiento' => '1981-10-05',
            'rfc' => 'FAMJ811005DZ3',
            'sexo_id' => 1,
            'pais_id' => 86,
            'nacionalidad_id' => 86,
            'user_id' => $user_id
        ]);
    }
}
