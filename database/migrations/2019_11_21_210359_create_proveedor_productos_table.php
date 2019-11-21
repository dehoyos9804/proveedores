<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('CASCADE')->onCascade('CASCADE');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('CASCADE')->onCascade('CASCADE');
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
        Schema::dropIfExists('proveedor_productos');
    }
}
