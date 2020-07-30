<?php

use Illuminate\Database\Seeder;

class LabBarcodeMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('lab_barcode_master')->delete();
        if($SeedEngVer){
          \DB::table('lab_barcode_master')->insert(array (
              0 =>
              array (
                  'id_lab_barcode' => 1,
                  'lab_barcode_name' => 'Test Lab barcode',
                  'id_hospital' => 1,
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_lab_barcode' => 2,
                  'lab_barcode_name' => 'Test Lab barcode 2',
                  'id_hospital' => 1,
                  'stdel' => 0,
              ),
          ));
        }else{
          \DB::table('lab_barcode_master')->insert(array (
              0 =>
              array (
                  'id_lab_barcode' => 1,
                  'lab_barcode_name' => 'ทดสอบ Lab barcode',
                  'id_hospital' => 1,
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_lab_barcode' => 2,
                  'lab_barcode_name' => 'ทดสอบ Lab barcode2',
                  'id_hospital' => 1,
                  'stdel' => 0,
              ),
          ));

        }


    }
}
