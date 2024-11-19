<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsEstadoToAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            // Se añade la columna para la tabla participantes
            $table->tinyInteger('estado_id')->nullable(true)->default(null)->after('pais_id')->comment('Almacena el ID del estado del alumno en caso de haber nacido en México.');
            $table->index('estado_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            // Se borra la columna en caso de ser necesario
            $table->dropColumn('estado_id');
        });
    }
}
