<?php

namespace DummyNamespace;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DummyClass
 */
class DummyClass extends Model
{
    protected $table = 'rol_opcion';

    public $timestamps = false;

    protected $fillable = [
        'id_permiso',
        'id_rol'
    ];

    protected $guarded = [];

        
}