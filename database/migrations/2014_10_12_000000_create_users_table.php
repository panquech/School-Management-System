<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Helpers\Qs;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumIncrements('id')->unsigned();
            $table->string('name');
            $table->string('apellido1')->nullable(true);
            $table->string('apellido2')->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('confirmado')->nullable(true)->default(0)->comment('Almacena un indicador para saber si el usuario ya validó o no su email');
            $table->string('password');
            $table->string('codigo_confirmacion',30)->nullable(true)->default(null)->comment('Almacena un código único aleatorio para la confirmación del usuario a través de su correo electrónico');
            $table->string('ruta_imagen', 300)->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
