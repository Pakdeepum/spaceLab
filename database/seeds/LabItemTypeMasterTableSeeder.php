<?php

use Illuminate\Database\Seeder;

class LabItemTypeMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('lab_item_type_master')->delete();

        \DB::table('lab_item_type_master')->insert([
          [
          'id_Item_type'=>1,
          'item_type_name'=>'CHEMISTRY',
          'id_hospital'=>1,
          'stdel'=>0
          ],



          [
          'id_Item_type'=>13,
          'item_type_name'=>'IMMUNOLOGY',
          'id_hospital'=>1,
          'stdel'=>0
        ],



          [
          'id_Item_type'=>14,
          'item_type_name'=>'Hematology',
          'id_hospital'=>1,
          'stdel'=>0
        ]
        ]);


    }
}
