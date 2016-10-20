<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
			$table->foreign('id_rol', 'Usuario_id_rol_fkey')->references('id_rol')->on('rol')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_municipio', 'usuario_id_municipio_fkey')->references('id_municipio')->on('municipio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
			$table->dropForeign('Usuario_id_rol_fkey');
			$table->dropForeign('usuario_id_municipio_fkey');
		});
	}

}
