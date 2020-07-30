<?php

use Illuminate\Database\Seeder;

class AppointmentOrderDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('appointment_order_data')->delete();
        
        \DB::table('appointment_order_data')->insert(array (
           
        ));

    }
}