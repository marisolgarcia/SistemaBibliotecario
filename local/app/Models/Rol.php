<?php

namespace DummyNamespace;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DummyClass
 */
class DummyClass extends Model
{
    protected $table = 'rol';

    protected $primaryKey = 'id_rol';

	public $timestamps = false;

    protected $fillable = [
        'n_rol'
    ];

    protected $guarded = [];

        
}