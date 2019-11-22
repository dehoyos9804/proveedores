<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor_Producto extends Model

{
    protected $table='proveedor_productos';

    protected $fillable = ['id', 'proveedor_id', 'producto_id'];

    public function detalle_compras() {
       return $this->hasMany('App\Models\Detalle_Compra');
    }
}
