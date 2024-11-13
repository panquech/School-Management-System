<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SepomexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // LOAD DATA LOCAL INFILE '/home/www_frida/CPdescarga.txt' INTO TABLE sepomex CHARACTER SET latin1 COLUMNS TERMINATED BY '|' LINES TERMINATED BY '\n' ignore 2 lines;

        // SELECT * FROM sepomex WHERE d_codigo = 15530;

        // SELECT * FROM sepomex_cp sc
        // JOIN sepomex_estados se ON se.c_estado  = sc.c_estado
        // JOIN sepomex_asentamientos sa ON sa.c_tipo_asenta = sc.c_tipo_asenta
        // JOIN sepomex_municipios sm ON sm.c_estado = se.c_estado AND sm.c_mnpio = sc.c_mnpio
        // WHERE d_codigo = 62294;

        DB::table('sepomex')->truncate();
        /** 
         * Para poder usar el método 'LOAD DATA LOCAL INFILE' tenemos que asegurarnos de dos cosas:
         * 
         * 1. que el archivo de MySql 'my.ini' tenga habilitada la función:
         *      local_infile=1
         * 2. que laravel permita este tipo de carga de archivos
         *      en config/database.php colocar en 
         *      'connections' => [
         *          'mysql' => [
         *              'options' => [
         *                   PDO::MYSQL_ATTR_LOCAL_INFILE => true,
         *              ]
         *      Agregar el arreglo de 'options' la linea de PDO...
        */
        DB::connection()->getPdo()->exec("LOAD DATA LOCAL INFILE 'database/infiles/CPdescarga.txt' INTO TABLE sepomex CHARACTER SET 'latin1' COLUMNS TERMINATED BY '|' LINES TERMINATED BY '\n' ignore 2 lines;");

        // Se desactiva la revisión de llaves foráneas
        DB::statement('SET SQL_SAFE_UPDATES = 0;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('sepomex_cp')->truncate();
        DB::table('sepomex_municipios')->truncate();
        DB::table('sepomex_asentamientos')->truncate();
        DB::table('sepomex_estados')->truncate();


        $this->command->info('Cargando valores para tablas del SEPOMEX');
        DB::statement('INSERT INTO sepomex_estados SELECT c_estado, d_estado FROM sepomex GROUP BY c_estado, d_estado;');
        DB::statement("UPDATE sepomex_estados SET d_estado = 'Veracruz' WHERE d_estado = 'Veracruz de Ignacio de la Llave';");
        DB::statement("UPDATE sepomex_estados SET d_estado = 'Michoacán' WHERE d_estado = 'Michoacán de Ocampo';");
        DB::statement("UPDATE sepomex_estados SET d_estado = 'Coahuila' WHERE d_estado = 'Coahuila de Zaragoza';");
        DB::statement('INSERT INTO sepomex_asentamientos SELECT c_tipo_asenta, d_tipo_asenta FROM sepomex GROUP BY c_tipo_asenta, d_tipo_asenta;');
        DB::statement('INSERT INTO sepomex_municipios SELECT c_mnpio, D_mnpio, c_estado FROM sepomex GROUP BY c_mnpio, D_mnpio, c_estado;');
        DB::statement('INSERT INTO sepomex_cp SELECT d_codigo, id_asenta_cpcons, c_mnpio, c_tipo_asenta, d_asenta, c_estado FROM sepomex GROUP BY d_codigo, id_asenta_cpcons, c_mnpio, c_tipo_asenta, d_asenta, c_estado;');

        // Se activa nuevamente la revisión de llaves foráneas
        DB::statement('SET SQL_SAFE_UPDATES = 1');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
