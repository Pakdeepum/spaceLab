<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormLabMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('form_lab_master', function(Blueprint $table)
		{
			$table->increments('id_form');
			$table->string('form_name')->nullable();
			$table->string('form_code')->nullable();
			$table->string('note')->nullable();
			$table->integer('stdel')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('form_lab_master');
	}

}
