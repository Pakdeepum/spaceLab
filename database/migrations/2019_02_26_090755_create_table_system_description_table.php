<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableSystemDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('table_system_description', function(Blueprint $table)
		{
			$table->increments('id_table_field_name');
			$table->string('table_field_name_use')->nullable();
			$table->string('table_field_name_show')->nullable();
			$table->integer('id_table')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('visible')->nullable()->default(0);
			$table->integer('priority')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('table_system_description');
	}

}
