<?php

namespace DummyNamespace;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DummyClass
 */
class DummyClass extends Model
{
    protected $table = 'municipio';

    protected $primaryKey = 'id_municipio';

	public $timestamps = false;

    protected $fillable = [
        'nombre',
        'id_departamento'
    ];

    protected $guarded = [];

        
}