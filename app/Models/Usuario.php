<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Usuario as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    protected $table='usuarios';
<<<<<<< HEAD

    protected $fillable = ['id', 'nombre', 'apellido','correo','contraseña'];

=======

    protected $guard_name='web';
    

    protected $fillable = ['id', 'nombre', 'apellido','correo','contraseña'];

    protected $hidden=[
        'password','remember_token','created_at','updated_at'
    ];
>>>>>>> origin/marlyn
}
