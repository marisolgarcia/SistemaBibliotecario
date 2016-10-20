<?php

namespace DummyNamespace;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DummyClass
 */
class DummyClass extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

	public $timestamps = false;

    protected $fillable = [
        'id_municipio',
        'activo',
        'clave',
        'nombre_usuario',
        'telefono',
        'nom_madre',
        'nom_padre',
        'direccion',
        'ocupacion',
        'genero',
        'lug_estudio',
        'fech_naci',
        'apellidos',
        'nombres',
        'id_rol',
        'id_biblioteca'
    ];

    protected $guarded = [];

        
}