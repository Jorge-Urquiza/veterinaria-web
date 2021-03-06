<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('ci');
            $table->string('celular');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //configuracion
            $table->string('color')->default('primary');
            $table->string('font_size')->default('15px');
            $table->enum('rol',['director', 'empleado' ])->default('empleado');
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
