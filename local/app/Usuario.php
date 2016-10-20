<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

/**
 * Class DummyClass
 */
class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'usuario',
        'password',
        'contraseña',
        'tipo_usuario',
        'unidad',
        'remember_token'
    ];

    protected $guarded = [];

        
}