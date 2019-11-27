<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto_Proveedor extends Model

{
    protected $table='producto_proveedor';

    protected $fillable = ['id', 'proveedor_id','producto_id'];

    public function detalle_compras() {
       return $this->hasMany('App\Models\Detalle_Compra')->withTimestamps();
    }
}
