<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVentaDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {

          
            $table->increments('id');
            $table->unsignedInteger('venta_id'); //Foreign de cliente
            $table->unsignedInteger('producto_id'); //Foreign de veterinario
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('subtotal');
            $table->foreign('venta_id')
            ->references('id')
            ->on('ventas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('producto_id')
            ->references('id')
            ->on('productos')
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
        Schema::dropIfExists('venta_detalles');
    }
}
