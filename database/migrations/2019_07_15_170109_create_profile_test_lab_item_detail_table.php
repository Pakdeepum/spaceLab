<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTestLabItemDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_test_lab_item_detail', function (Blueprint $table) {
            $table->increments('id_profile_test_detail');
            $table->integer('id_profile_test_lab_item')->nullable();
            $table->integer('id_lab_item')->nullable();        
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
        Schema::dropIfExists('profile_test_lab_item_detail');
    }
}
