<?php

use Illuminate\Database\Seeder;

class LabSubGroupItemMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('lab_sub_group_item_master')->delete();

        \DB::table('lab_sub_group_item_master')->insert([
          [
          'id_lab_sub_group_item'=>1,
          'lab_sub_group_name'=>'Hematology',
          'lab_sub_group_code'=>'LAB0001',
          'note'=>'',
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_lab_sub_group_item'=>2,
          'lab_sub_group_name'=>'Blood coagulation',
          'lab_sub_group_code'=>'LAB0002',
          'note'=>NULL,
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_lab_sub_group_item'=>3,
          'lab_sub_group_name'=>'CHEMISTRY',
          'lab_sub_group_code'=>'LAB0003',
          'note'=>'',
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_lab_sub_group_item'=>4,
          'lab_sub_group_name'=>'Immunology',
          'lab_sub_group_code'=>'LAB0004',
          'note'=>'',
          'stdel'=>1,
          'id_hospital'=>2
          ],



          [
          'id_lab_sub_group_item'=>5,
          'lab_sub_group_name'=>'Creatinine',
          'lab_sub_group_code'=>'LAB0005',
          'note'=>NULL,
          'stdel'=>1,
          'id_hospital'=>2
          ],



          [
          'id_lab_sub_group_item'=>6,
          'lab_sub_group_name'=>'Immunology',
          'lab_sub_group_code'=>'LAB0004',
          'note'=>'',
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_lab_sub_group_item'=>7,
          'lab_sub_group_name'=>'Urinalysis',
          'lab_sub_group_code'=>'LAB0005',
          'note'=>'',
          'stdel'=>0,
          'id_hospital'=>1
          ]
        ]);


    }
}
