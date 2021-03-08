<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            //$table->id();
            $table->integer('venta_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->decimal('precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
