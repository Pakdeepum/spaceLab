<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('department_master', function(Blueprint $table)
		{
			$table->increments('id_department');
			$table->string('department_name')->nullable();
			$table->string('department_note')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_hospital')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('department_master');
	}

}
