<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{
    protected $table='detalle_compras';

    protected $fillable = ['id', 'compra_id', 'proveedor_producto_id', 'cantidad','valor_unitario'];

    public function proveedor_productos() {
       return $this->belongsTo('App\Models\Proveedor_Producto');
    }
    
   public function compras() {
      return $this->belongsTo('App\Models\Compra');
   }
}
