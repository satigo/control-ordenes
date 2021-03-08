<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->integer('id_user')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
        });
    }

    public function ventas() {
        return $this->belongsToMany('App\Models\Venta');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
