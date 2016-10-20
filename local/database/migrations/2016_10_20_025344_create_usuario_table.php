<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->integer('id_usuario', true);
			$table->integer('id_biblioteca', true);
			$table->integer('id_rol')->nullable();
			$table->string('nombres', 30)->nullable();
			$table->string('apellidos', 30)->nullable();
			$table->date('fech_naci')->nullable();
			$table->string('lug_estudio', 50)->nullable();
			$table->char('genero', 1)->nullable();
			$table->string('ocupacion', 50)->nullable();
			$table->string('direccion', 50)->nullable();
			$table->string('nom_padre', 50)->nullable();
			$table->string('nom_madre', 50)->nullable();
			$table->char('telefono', 1)->nullable();
			$table->string('nombre_usuario', 20)->nullable();
			$table->char('clave', 10)->nullable();
			$table->boolean('activo')->nullable();
			$table->char('id_municipio', 4);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
