<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatNacionalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_nacionalidades', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned()->comment('Llave primaria de la tabla');
            $table->string('codigo_pais', 10)->nullable(false)->comment('Almacena el código de la nacionalidad');
            $table->string('nacionalidad', 70)->nullable(false)->comment('Almacena la nacionalidad del aspirante que se registra');
            $table->string('clave_nacionalidad', 10)->nullable(false)->comment('Almacena la clave (abreviatura) de la nacionalidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_nacionalidades');
    }
}
