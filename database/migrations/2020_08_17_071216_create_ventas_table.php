<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit')->nullable(); // las ventas pueden o no tener NIT
            $table->unsignedInteger('cliente_id'); //Foreign de cliente
            $table->unsignedInteger('veterinario_id'); //Foreign de veterinario
            $table->date('fecha'); //fecha de venta
            $table->time('hora')->nullable();  // hora
            $table->double('total');  //costo total de la venta
            // FK
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes');
            $table->foreign('veterinario_id')
            ->references('id')
            ->on('users');
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
        Schema::dropIfExists('ventas');
    }
}
