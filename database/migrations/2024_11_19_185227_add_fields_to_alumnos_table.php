<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            // Se añade el campo necesario para especificar el sexo
            $table->string('otro_sexo', 50)->nullable(true)->after('sexo_id')->comment('En caso necesario, el aspirante podrá especificar el sexo/género con el cual se siente identificado');
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
            //
            $table->dropColumn('otro_sexo');
        });
    }
}
