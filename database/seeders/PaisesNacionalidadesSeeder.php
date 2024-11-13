<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesNacionalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Carga mediante infiles de los catálogos de nacionalidades y países
        // Se desactiva la revisión de llaves foráneas
        DB::statement('SET SQL_SAFE_UPDATES = 0;');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        
        $this->command->info("Truncando tabla cat_nacionalidades");
        DB::table('cat_nacionalidades')->truncate();
        $this->command->info("Cargando tabla cat_nacionalidades");
        DB::connection()->getPdo()->exec("LOAD DATA LOCAL INFILE 'database/infiles/nacionalidades.txt' INTO TABLE cat_nacionalidades CHARACTER SET 'latin1' COLUMNS TERMINATED BY '|' LINES TERMINATED BY '\n' ignore 2 lines;");


        // Carga del catálogo de países
        $this->command->info("Truncando tabla cat_paises");
        DB::table('cat_paises')->truncate();
        $this->command->info("Cargando tabla cat_paises");
        DB::connection()->getPdo()->exec("LOAD DATA LOCAL INFILE 'database/infiles/paises.txt' INTO TABLE cat_paises CHARACTER SET 'utf8mb4' COLUMNS TERMINATED BY '|' LINES TERMINATED BY '\n' ignore 2 lines;");
        // Se activa nuevamente la revisión de llaves foráneas
        
        
        DB::statement('SET SQL_SAFE_UPDATES = 1');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
