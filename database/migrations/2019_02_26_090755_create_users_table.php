<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 191);
			$table->string('email', 191);
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('username', 191)->nullable();
			$table->integer('prefix_name')->nullable();
			$table->string('fname', 191)->nullable();
			$table->string('lastname', 191)->nullable();
			$table->integer('position')->nullable();
			$table->integer('user_department')->nullable();
			$table->dateTime('regis_date')->nullable();
			$table->string('user_pic_url', 191)->nullable();
			$table->integer('id_group_user')->nullable();
			$table->integer('stdel')->nullable();
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
		Schema::drop('users');
	}

}
