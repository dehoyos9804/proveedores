<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';

    protected $fillable = ['id', 'nombre', 'descripcion','categoria_id'];

    public function categoria() {
       return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

   //muchos a muchos
   public function proveedores() {
        return $this->belongsToMany('App\Models\Proveedor');
   }
}
