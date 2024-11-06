<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRfcToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // se ponen nullable ya que los registro anteriores no tienen estos campos y de otro modo daría error.
            $table->string('rfc', 13)->after('name')->nullable();
            $table->string('curp', 18)->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['rfc', 'curp']); // Eliminar las columnas 'rfc' y 'curp'
        });
    }
}
