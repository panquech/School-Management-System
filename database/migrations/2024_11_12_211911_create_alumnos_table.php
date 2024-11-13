<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned()->comment('Almacena la llave primaria de la tabla');
            $table->string('nombre_artistico', 150)->nullable(true)->comment('Almacena el nombre artístico de la persona aspirante');
            $table->date('fecha_nacimiento')->nullable(false)->comment('Almacena la fecha de nacimiento del aspirante, para mostrar su edad');
            $table->string('curp', 18)->nullable(true)->comment('Almacena los 18 caracteres de la Clave Única de Registro de Población');
            $table->string('rfc', 13)->nullable(true)->comment('Almacena los 13 caracteres del Registro Federal de Contribuyentes');
            $table->unsignedTinyInteger('sexo_id')->nullable(true)->comment('Almacena el ID del sexo de la persona aspirante');
            $table->unsignedSmallInteger('pais_id')->nullable(true)->comment('Almacena el ID del catálogo de países para indicar su lugar de nacimiento');
            $table->unsignedSmallInteger('nacionalidad_id')->nullable(true)->comment('Almacena el ID del catálogo de países para indicar la nacionalidad de la persona aspirante');
            $table->unsignedMediumInteger('user_id')->nullable(false)->comment('Almacena el ID del usuario que realiza la captura de los datos generales del aspirante');
            $table->timestamps();
            
            // Llaves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('pais_id')->references('id')->on('cat_paises')->onUpdate('cascade');
            $table->foreign('nacionalidad_id')->references('id')->on('cat_nacionalidades')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
