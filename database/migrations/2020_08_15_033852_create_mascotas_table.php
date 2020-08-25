<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('raza');
            $table->string('color');
            $table->enum('tipo', ['Perro', 'Gato', 'Otro'])->default('Otro');
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('mascotas');
    }
}
