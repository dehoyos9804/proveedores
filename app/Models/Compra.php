<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';

    protected $fillable = ['id', 'fecha', 'descripcion','proveedor_id'];

    public function proveedor() {
       return $this->belongsTo('App\Models\Proveedor','proveedor_id')->withTimestamps();
       
    }

   
   public function detalle_compras() {
      return $this->hasMany('App\Models\Detalle_Compra')->withTimestamps();
   }
}
