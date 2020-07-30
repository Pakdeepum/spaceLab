<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTestLabItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_test_lab_item', function (Blueprint $table) {
            $table->increments('id_profile_test');
            $table->string('profile_name')->nullable();
            $table->integer('id_lab_sub_group_item')->nullable();
            $table->integer('id_user_create')->nullable();
            //$table->dateTime('date_create')->nullable();
            $table->integer('id_user_modify')->nullable();
            //$table->dateTime('date_modify')->nullable();
            $table->integer('stdel')->nullable()->default(0);
            $table->integer('id_hospital')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_test_lab_item');
    }
}
