<?php

use Illuminate\Database\Seeder;

class LabSpecimenItemMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('lab_specimen_item_master')->delete();

        \DB::table('lab_specimen_item_master')->insert([
          [
            'id_lab_specimen_item'=>1,
            'lab_specimen_item_name'=>'Sputum',
            'lab_specimen_item_code'=>'A1',
            'lab_specimen_item_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>2,
            'lab_specimen_item_name'=>'Throat swap',
            'lab_specimen_item_code'=>'A2',
            'lab_specimen_item_note'=>' ',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>3,
            'lab_specimen_item_name'=>'Whole blood',
            'lab_specimen_item_code'=>'WBL',
            'lab_specimen_item_note'=>' ',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>4,
            'lab_specimen_item_name'=>'bone marrow',
            'lab_specimen_item_code'=>'B2',
            'lab_specimen_item_note'=>' ',
            'stdel'=>1,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>5,
            'lab_specimen_item_name'=>'CSF',
            'lab_specimen_item_code'=>'C1',
            'lab_specimen_item_note'=>' ',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>6,
            'lab_specimen_item_name'=>'SER',
            'lab_specimen_item_code'=>'SER',
            'lab_specimen_item_note'=>'serum',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>7,
            'lab_specimen_item_name'=>'URI',
            'lab_specimen_item_code'=>'URI',
            'lab_specimen_item_note'=>'Urine',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>8,
            'lab_specimen_item_name'=>'ทดสอบ',
            'lab_specimen_item_code'=>'ทดสอบ',
            'lab_specimen_item_note'=>'ทดสอบ',
            'stdel'=>1,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>9,
            'lab_specimen_item_name'=>'ทดสอบ',
            'lab_specimen_item_code'=>'ทดสอบ',
            'lab_specimen_item_note'=>'ทดสอบ',
            'stdel'=>1,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>10,
            'lab_specimen_item_name'=>'ทดสอบ',
            'lab_specimen_item_code'=>'ทดสอบ',
            'lab_specimen_item_note'=>'ทดสอบ',
            'stdel'=>1,
            'id_hospital'=>1
            ],



            [
            'id_lab_specimen_item'=>11,
            'lab_specimen_item_name'=>'sdfdsfds',
            'lab_specimen_item_code'=>'sdfsdfsd',
            'lab_specimen_item_note'=>'sdfdsf',
            'stdel'=>1,
            'id_hospital'=>1
            ]
        ]);


    }
}
