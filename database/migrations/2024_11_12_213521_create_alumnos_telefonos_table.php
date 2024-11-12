<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAlumnosTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_telefonos', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned()->comment('Llave primaria de la tabla');
            $table->unsignedMediumInteger('solicitud_id')->nullable(false)->comment('Almacena el ID del aspirante para su relación con el número telefónico');
            $table->decimal('num_telefonico', 10, 0)->nullable(true)->comment('Almacena los 10 dígitos del número telefónico, puede ser fijo o móvil');
            $table->enum('tipo_telefono', ['FIJO', 'MOVIL'])->nullable(false)->comment('Almacena el tipo de teléfono registrado por el aspirante');
            $table->unsignedMediumInteger('user_id')->nullable(false)->comment('Almacena el ID del usuario para identificar quién realiza la captura');
            $table->timestamps();

            // Llaves foráneas de la tabla
            $table->foreign('solicitud_id')->references('id')->on('solicitudes_aspirantes')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });

        // Comentarios adicionales de la tabla
        DB::statement('ALTER TABLE aspirantes_telefonos COMMENT = "Almacena la información relacionada con los números telefónicos de contacto del aspirante"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirantes_telefonos');
    }
}
