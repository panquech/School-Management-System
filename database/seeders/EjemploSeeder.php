<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EjemploSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Este seeder ha sido creado para cargar todos los datos correspondientes con un alumno/postulante de la plataforma del SADCE
        // Se inicia con la creación de un usuario
        $id = DB::table('users')->insertGetId([
            'name' => 'Juan',
            'apellido1' => 'Pérez',
            'apellido1' => 'Jolote',
            'email' => 'juan.perezj@dom.comm',
            'password' => md5('password'),
            'email_verified_at' => Carbon::Now(),
            'confirmado' => 1,
            'created_at' => Carbon::Now()
        ]);

        // Usamos el id del usuario dado de alta para insertarlo en los datos del alumno
        $postulante = DB::table('alumnos')->insertGetId([
            'nombre_artistico' => 'Juanito Pérez Jolote',
            'fecha_nacimiento' => '1960-10-01',
            'curp' => 'PEJJ601001HDFRLN06',
            'rfc' => 'PEJJ601001FG5',
            'sexo_id' => 1,
            'pais_id' => 73,
            'nacionalidad_id' => 73,
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]);

/*         // Ahora con ASPIRANTES_DATOS_ESTADISTICOS
        DB::table('aspirantes_datos_estadisticos')->insert([
            'aspirante_id' => $postulante,
            'recibe_estimulo' => 'NO',
            'nombre_institucion' => null,
            'conocio_id' => 1,
            'otro_conocio' => null,
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]);

        // TABLA: aspirantes_datos_laborales
        DB::table('aspirantes_datos_laborales')->insert([
            'aspirante_id' => $postulante,
            'trabaja_actualmente' => 'NO',
            'tipo_organizacion' => 'OTRO',
            'nombre_organizacion' => null,
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]);
 */
        // TABLA: aspirantes_domicilios
        DB::table('alumnos_domicilios')->insert([
            'alumno_id' => $postulante,
            'calle' => 'AV. SIEMPRE VIVA',
            'num_exterior' => '1211',
            'num_interior' => null,
            'referencia1' => 'ENTRE ANILLO PERIFÉRICO',
            'referencia2' => 'Y CALZADA DE TLALPAN',
            'colonia' => 'MOCTEZUMA 2A SECCION',
            'd_codigo' => '15530',
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]);

/*         // TABLA: aspirantes_grados_academicos
        DB::table('aspirantes_grados_academicos')->insert([
            'aspirante_id' => $postulante,
            'grado_estudios' => 1,
            'especialidad' => 'COMPUTACIÓN',
            'nombre_institucion' => 'ESCUELA SUPERIOR DE INGENIERÍA',
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]);

        // TABLA: aspirantes_telefonos
        DB::table('aspirantes_telefonos')->insert([
            'aspirante_id' => $postulante,
            'num_telefonico' => 5557843615,
            'tipo_telefono' => 'MOVIL',
            'user_id' => $id,
            'created_at' => Carbon::Now()
        ]); */
    }
}
