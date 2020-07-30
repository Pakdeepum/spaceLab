<?php

use Illuminate\Database\Seeder;

class LabResultPhotoDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lab_result_photo_detail')->delete();
        
        \DB::table('lab_result_photo_detail')->insert(array (
          
        ));
        
        
    }
}