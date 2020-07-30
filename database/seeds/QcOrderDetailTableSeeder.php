<?php

use Illuminate\Database\Seeder;

class QcOrderDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qc_order_detail')->delete();
        
        \DB::table('qc_order_detail')->insert(array (
           
        ));
        
        
    }
}