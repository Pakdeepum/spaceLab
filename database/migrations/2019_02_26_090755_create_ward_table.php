<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ward', function(Blueprint $table)
		{
			$table->increments('id_ward', true);
			$table->string('ward_name')->nullable();
			$table->string('ward_code')->nullable();
			$table->integer('id_hospital')->nullable();
			$table->integer('stdel')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ward');
	}

}
