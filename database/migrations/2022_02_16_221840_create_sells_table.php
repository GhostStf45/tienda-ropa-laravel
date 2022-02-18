<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto_id');
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('tienda_id');

            $table->float('precio_de_venta');
            $table->float('utilidad');

            $table->integer('cantidad_vendida');



            $table->timestamps();
        });
        Schema::table('ventas', function($table) {
            $table->foreign('codigo_producto_id')->references('codigo_producto')->on('productos')->onDelete('cascade');
            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
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
