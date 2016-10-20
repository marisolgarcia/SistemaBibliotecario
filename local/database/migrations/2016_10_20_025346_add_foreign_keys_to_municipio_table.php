<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMunicipioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('municipio', function(Blueprint $table)
		{
			$table->foreign('id_departamento', 'municipio_id_departamento_fkey')->references('id_departamento')->on('departamento')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('municipio', function(Blueprint $table)
		{
			$table->dropForeign('municipio_id_departamento_fkey');
		});
	}

}
