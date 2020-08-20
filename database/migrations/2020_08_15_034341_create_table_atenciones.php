<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAtenciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('tipo'); // tipo de atencion  (emergencia preventivo control)
            $table->string('problema')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('tratamiento')->nullable();

            $table->unsignedInteger('veterinario_id');
            $table->foreign('veterinario_id')->references('id')->on('users');

            $table->unsignedInteger('mascota_id');
            $table->foreign('mascota_id')->references('id')->on('mascotas');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atenciones');
    }
}
