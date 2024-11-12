<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCatPaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_paises', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned()->comment('Llave primaria de la tabla');
            $table->string('codigo_pais', 10)->nullable(false)->comment('Almacena el código de la nacionalidad');
            $table->string('pais', 70)->nullable(false)->comment('Almacena la nacionalidad del aspirante que se registra');
            $table->string('clave_pais', 10)->nullable(false)->comment('Almacena el código de la nacionalidad');
        });
        // Comentarios adicionales de la tabla
        DB::statement('ALTER TABLE cat_paises COMMENT = "Contiene el listado de países a utilizar en el sistema del SADCE"');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_paises');
    }
}
