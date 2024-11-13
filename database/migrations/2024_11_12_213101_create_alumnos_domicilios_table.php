<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAlumnosDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_domicilios', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned()->comment('La llave primaria de la tabla');
            $table->unsignedMediumInteger('alumno_id')->comment('La llave foránea para relacionar el domicilio con el ID de la solicitud del aspirante');
            $table->string('calle', 120)->nullable(false)->comment('Almacena la calle o avenida donde se encuentra el domicilio del aspirante');
            $table->string('num_exterior', 50)->nullable(true)->comment('Almacena el número exterior del domicilio capturado');
            $table->string('num_interior', 50)->nullable(true)->comment('Almacena el número interior, si aplica, del domicilio capturado');
            $table->string('referencia1', 60)->nullable(true)->comment('Almacena, si aplica, una referencia del domicilio capturado');
            $table->string('referencia2', 60)->nullable(true)->comment('Almacena, si aplica, una segunda referencia del domicilio capturado');
            $table->string('colonia', 100)->nullable(false)->comment('Almacena el asentamiento donde se ubica el domicilio capturado');
            $table->string('d_codigo', 5)->nullable(true)->comment('El código postal del domicilio');
            $table->unsignedMediumInteger('user_id')->nullable(false)->comment('Almacena el ID del usuario que realiza la captura');
            $table->timestamps();

            // Declaración de llaves foráneas
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            //$table->foreign('d_codigo')->references('d_codigo')->on('sepomex_cp');
            $table->index('d_codigo');
        });
        // Comentarios adicionales de la tabla
        DB::statement('ALTER TABLE alumnos_domicilios COMMENT = "Esta tabla almacena la información relacionada con los domicilios de los alumnos"');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_domicilios');
    }
}
