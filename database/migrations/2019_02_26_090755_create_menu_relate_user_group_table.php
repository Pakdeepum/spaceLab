<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuRelateUserGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_relate_user_group', function(Blueprint $table)
		{
			$table->increments('id_relate');
			$table->string('id_user_group')->nullable();
			$table->integer('id_menu')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_relate_user_group');
	}

}
