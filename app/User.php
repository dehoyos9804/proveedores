<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    protected $table= 'users';
    protected $guard_name='web';

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password','remember_token','created_at','updated_at'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
