<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmphurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amphur', function(Blueprint $table)
		{
			$table->increments('amphur_id');
			$table->string('amphur_code', 4);
			$table->string('amphur_name', 150);
			$table->integer('geo_id')->default(0);
			$table->integer('province_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amphur');
	}

}
