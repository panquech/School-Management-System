<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_tutores', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned()->comment('La llave primaria de la tabla');
            $table->unsignedMediumInteger('aspirante_id')->nullable(true)->default(null)->comment('Esta llave foránea relaciona con la tabla de aspirantes');
            $table->enum('parentesco', ['PADRE', 'MADRE', 'TUTOR'])->nullable(true)->default(null)->comment('Indica el parentesco con el aspirante');
            $table->string('nombre', 150)->nullable(true)->default('')->comment('Almacena el nombre del tutor');
            $table->string('apellidos', 150)->nullable(true)->default('')->comment('Almacena los apellidos del tutor');
            $table->string('telefono', 10)->nullable(true)->default('')->comment('Almacena el teléfono del tutor');
            $table->string('correo', 120)->nullable(true)->default('')->comment('Almacena el teléfono del tutor');
            $table->unsignedMediumInteger('user_id')->nullable(false)->comment('Almacena el ID del usuario que realiza la captura de los datos generales del aspirante');
            $table->timestamps();

            // Creación de las llaves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            //$table->foreign('aspirante_id')->references('id')->on('aspirantes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_tutores');
    }
}
