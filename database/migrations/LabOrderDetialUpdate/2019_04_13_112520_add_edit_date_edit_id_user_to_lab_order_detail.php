<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditDateEditIdUserToLabOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lab_order_detail', function (Blueprint $table) {
        $table->dateTime('edit_date')->after('approve_id_user')->nullable();
        $table->integer('edit_id_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('lab_order_detail', function($table) {
            $table->dropColumn('edit_date');
    				$table->dropColumn('edit_id_user');
        });
    }
}
