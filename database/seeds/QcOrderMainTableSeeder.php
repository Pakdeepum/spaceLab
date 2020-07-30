<?php

use Illuminate\Database\Seeder;

class QcOrderMainTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qc_order_main')->delete();
        
        \DB::table('qc_order_main')->insert(array (
         
        ));
        
        
    }
}