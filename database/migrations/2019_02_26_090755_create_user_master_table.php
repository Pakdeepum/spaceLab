<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_master', function(Blueprint $table)
		{
			$table->increments('id_user');
			$table->string('username')->nullable();
			$table->string('password')->nullable();
			$table->integer('prefix_name')->nullable();
			$table->string('fname')->nullable();
			$table->string('lastname')->nullable();
			$table->integer('position')->nullable();
			$table->integer('user_department')->nullable();
			$table->dateTime('regis_date')->nullable();
			$table->string('user_pic_url')->nullable();
			$table->integer('id_group_user')->nullable();
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
		Schema::drop('user_master');
	}

}
