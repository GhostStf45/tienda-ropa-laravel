<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto');
            $table->unsignedBigInteger('tipo_producto_id');
            $table->unsignedBigInteger('marca_id');
            $table->decimal('costo');
            $table->integer('cantidad');
            $table->text('descripcion');






            $table->timestamps();
        });
        Schema::table('productos', function($table) {
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_productos')->onDelete('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
        });
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
