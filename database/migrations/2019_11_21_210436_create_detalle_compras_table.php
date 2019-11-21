<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compra_id')->unsigned();
            $table->integer('proveedor_producto_id')->unsigned();
            $table->integer('cantidad');
            $table->double('valor_unitario');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('CASCADE')->onCascade('CASCADE');
            $table->foreign('proveedor_producto_id')->references('id')->on('proveedor_productos')->onDelete('CASCADE')->onCascade('CASCADE');
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
        Schema::dropIfExists('detalle_compras');
    }
}
