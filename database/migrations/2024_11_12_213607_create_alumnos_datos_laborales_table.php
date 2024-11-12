<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAlumnosDatosLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_datos_laborales', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned()->comment('Almacena la llave primaria de la tabla');
            $table->unsignedMediumInteger('solicitud_id')->nullable(false)->comment('Almacena el ID del aspirante para relacionar los datos laborales con la tabla aspirantes');
            $table->enum('trabaja_actualmente', ['SI', 'NO'])->nullable(false)->comment('Almacena el estado laboral actual del aspirante');
            $table->enum('tipo_organizacion', ['INDEPENDIENTE', 'PÚBLICA', 'PRIVADA'])->nullable(true)->comment('Almacena el tipo de organización en la que labora el aspirante');
            $table->string('nombre_organizacion', 140)->nullable(true)->comment('Almacena el nombre del lugar de trabjo del aspirante');
            $table->unsignedMediumInteger('user_id')->nullable(false)->comment('Llave foránea que permite identificar al usuario que realiza la captura');
            $table->timestamps();

            // Declaración de llaves foráneas
            $table->foreign('solicitud_id')->references('id')->on('solicitudes_aspirantes')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });

        // Se añade un comentario de tabla
        DB::statement('ALTER TABLE aspirantes_datos_laborales COMMENT = "Tabla que almacena lo relacionado con los datos laborales de los aspirantes cuando realizan una solicitud"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirantes_datos_laborales');
    }
}
