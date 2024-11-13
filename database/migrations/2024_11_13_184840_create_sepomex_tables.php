<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSepomexTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {

        // Este catálogo es el inicial, que sirve como insumo para generar los valores de los demás catálogos:
        // 1. sepomex_estados
        // 2. sepomex_municipios
        // 3. sepomex_asentamientos
        // 4. sepomex_cp
        Schema::create('sepomex', function (Blueprint $table) {
            $table->string('d_codigo', 5)->nullable()->comment('Código Postal asentamiento');
            $table->string('d_asenta')->nullable()->comment('Nombre asentamiento');
            $table->string('d_tipo_asenta')->nullable()->comment('Tipo de asentamiento (Catálogo SEPOMEX)');
            $table->string('D_mnpio')->nullable()->comment('Nombre Municipio (INEGI, Marzo 2013)');
            $table->string('d_estado')->nullable()->comment('Nombre Entidad (INEGI, Marzo 2013)');
            $table->string('d_ciudad')->nullable()->comment('Nombre Ciudad (Catálogo SEPOMEX)');
            $table->string('d_CP', 5)->nullable()->comment('Código Postal de la Administración Postal que reparte al asentamiento');
            $table->integer('c_estado')->nullable()->comment('Clave Entidad (INEGI, Marzo 2013)');
            $table->integer('c_oficina')->nullable()->comment('Código Postal de la Administración Postal que reparte al asentamiento');
            $table->integer('c_CP')->nullable()->comment('Campo Vacio');
            $table->integer('c_tipo_asenta')->nullable()->comment('Clave Tipo de asentamiento (Catálogo SEPOMEX)');
            $table->integer('c_mnpio')->nullable()->comment('Clave Municipio (INEGI, Marzo 2013)');
            $table->integer('id_asenta_cpcons')->nullable()->comment('Identificador único del asentamiento (nivel municipal)');
            $table->string('d_zona')->nullable()->comment('Zona en la que se ubica el asentamiento (Urbano/Rural)');
            $table->integer('c_cve_ciudad')->nullable()->comment('Clave Ciudad (Catálogo SEPOMEX)');
        });

        // ------- UNA VEZ CREADO EL CATÁLOGO ANTERIOR
        // Se crea el catálogo de SEPOMEX_ESTADOS
        Schema::create('sepomex_estados', function (Blueprint $table) {
            $table->integer('c_estado')->comment('Clave Entidad (INEGI, Marzo 2013)');
            $table->string('d_estado', 40)->nullable()->comment('Nombre Entidad (INEGI, Marzo 2013)');

            // Definición de la llave primaria
            $table->primary('c_estado');
        });

        // Esta instrucción convierte el campo c_estado por un enter de dos dígitos con ceros a la izquierda
        DB::statement('ALTER TABLE sepomex_estados CHANGE c_estado c_estado TINYINT(2) UNSIGNED ZEROFILL NOT NULL');

        // -------- FIN DE CATÁLOGO DE ESTADOS

        // Se crea el catálogo SEPOMEX_MUNICIPIOS
        Schema::create('sepomex_municipios', function (Blueprint $table) {
            $table->integer('c_mnpio')->nullable()->comment('Clave Municipio (INEGI, Marzo 2013)');
            $table->string('D_mnpio', 60)->nullable()->comment('Nombre Municipio (INEGI, Marzo 2013)');
            $table->integer('c_estado')->nullable()->comment('Clave Entidad (INEGI, Marzo 2013)');

            $table->index('c_estado');
            $table->primary(['c_mnpio', 'c_estado']);
        });

        DB::statement('ALTER TABLE sepomex_municipios CHANGE c_mnpio c_mnpio SMALLINT(3) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE sepomex_municipios CHANGE c_estado c_estado TINYINT(2) UNSIGNED ZEROFILL NOT NULL');
        // Definición de llave foránea con la tabla sepomex_estados
        DB::statement('ALTER TABLE sepomex_municipios ADD FOREIGN KEY (c_estado) REFERENCES sepomex_estados (c_estado)');

        // -------- FIN DEL CATÁLOGO DE MUNICIPIOS

        Schema::create('sepomex_asentamientos', function (Blueprint $table) {
            $table->integer('c_tipo_asenta')->nullable()->comment('Clave Tipo de asentamiento (Catálogo SEPOMEX)');
            $table->string('d_tipo_asenta', 30)->nullable()->comment('Tipo de asentamiento (Catálogo SEPOMEX)');

            // Definición de la llave primaria
            $table->primary('c_tipo_asenta');
        });

        // Esta instrucción convierte el campo c_estado por un enter de dos dígitos con ceros a la izquierda
        DB::statement('ALTER TABLE sepomex_asentamientos CHANGE c_tipo_asenta c_tipo_asenta TINYINT(2) UNSIGNED ZEROFILL NOT NULL');


        Schema::create('sepomex_cp', function (Blueprint $table) {
            $table->string('d_codigo', 5)->comment('Código Postal asentamiento');
            $table->smallInteger('id_asenta_cpcons')->nullable()->comment('Identificador único del asentamiento (nivel municipal)');
            $table->integer('c_mnpio')->nullable()->comment('Clave Municipio (INEGI, Marzo 2013)');
            $table->integer('c_tipo_asenta')->nullable()->comment('Clave Tipo de asentamiento (Catálogo SEPOMEX)');
            $table->string('d_asenta', 70)->nullable()->comment('Nombre asentamiento');
            $table->integer('c_estado')->nullable()->comment('Clave Entidad (INEGI, Marzo 2013)');

            // Definición de la llave primaria y los índices
            $table->primary(['d_codigo', 'id_asenta_cpcons']);
            $table->index('d_codigo');
            $table->index('c_tipo_asenta');
            $table->index('c_estado');

            /*  // Definición de llave foránea con la tabla sepomex_estados
            $table->foreign('c_estado')->references('c_estado')->on('sepomex_estados');
            $table->foreign('c_municipio')->references('c_municipio')->on('sepomex_municipios');
            $table->foreign('c_tipo_asenta')->references('c_tipo_asenta')->on('sepomex_asentamientos'); */
        });
        DB::statement('ALTER TABLE sepomex_cp CHANGE c_tipo_asenta c_tipo_asenta TINYINT(2) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE sepomex_cp CHANGE c_mnpio c_mnpio SMALLINT(3) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE sepomex_cp CHANGE c_estado c_estado TINYINT(2) UNSIGNED ZEROFILL NOT NULL');

        // Definición de llave foránea de la tabla con estados, municipios y asentamientos
        DB::statement('ALTER TABLE sepomex_cp ADD FOREIGN KEY (c_estado) REFERENCES sepomex_estados (c_estado)');
        DB::statement('ALTER TABLE sepomex_cp ADD FOREIGN KEY (c_mnpio) REFERENCES sepomex_municipios (c_mnpio)');
        DB::statement('ALTER TABLE sepomex_cp ADD FOREIGN KEY (c_tipo_asenta) REFERENCES sepomex_asentamientos (c_tipo_asenta)');
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('sepomex_cp');
        Schema::dropIfExists('sepomex_asentamientos');
        Schema::dropIfExists('sepomex_municipios');
        Schema::dropIfExists('sepomex_estados');
        Schema::dropIfExists('sepomex');
    }
}
