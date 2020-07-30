<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupUserMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_user_master', function(Blueprint $table)
		{
			$table->increments('id_group_user');
			$table->string('group_user_name')->nullable();
			$table->integer('stdel')->nullable()->default(0);
			$table->integer('id_hospital')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_user_master');
	}

}
