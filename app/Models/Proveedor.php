<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';

    protected $fillable = ['id', 'nombre', 'direccion','contacto','telefono','pagina_web'];

    public function productos() {
       return $this->belongsToMany('App\Models\Producto')
       ->withTimestamps();
    }
    
    public function compras() {
        return $this->hasMany('App\Models\Compra')->withTimestamps();
        
     }

}
