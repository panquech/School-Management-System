<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_sexos', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned()->comment('Almacena la llave primaria del catálogo');
            $table->string('descripcion')->nullable(false)->comment('Almacena la descripción del sexo/género en el catálogo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_sexos');
    }
}
