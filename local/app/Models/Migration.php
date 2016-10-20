<?php

namespace DummyNamespace;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DummyClass
 */
class DummyClass extends Model
{
    protected $table = 'migrations';

    public $timestamps = false;

    protected $fillable = [
        'batch',
        'migration'
    ];

    protected $guarded = [];

        
}