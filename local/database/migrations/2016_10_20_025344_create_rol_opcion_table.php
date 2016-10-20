<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolOpcionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rol_opcion', function(Blueprint $table)
		{
			$table->integer('id_rol', true);
			$table->integer('id_permiso', true);
			$table->primary(['id_rol','id_permiso'], 'rol_opcion_pkey');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rol_opcion');
	}

}
