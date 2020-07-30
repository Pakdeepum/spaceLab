<?php

use Illuminate\Database\Seeder;

class GroupBarcodeMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('group_barcode_master')->delete();

        \DB::table('group_barcode_master')->insert([
          [
          'id_group_barcode'=>1,
          'group_barcode_name'=>'TEST0021',
          'id_hospital'=>1,
          'stdel'=>1
          ],


          [
          'id_group_barcode'=>2,
          'group_barcode_name'=>'TEST0021',
          'id_hospital'=>1,
          'stdel'=>1
          ],


          [
          'id_group_barcode'=>3,
          'group_barcode_name'=>'Cloted Blood',
          'id_hospital'=>1,
          'stdel'=>0
          ],


          [
          'id_group_barcode'=>4,
          'group_barcode_name'=>'Cloted Blood',
          'id_hospital'=>1,
          'stdel'=>1
          ],


          [
          'id_group_barcode'=>5,
          'group_barcode_name'=>'EDTA Blood',
          'id_hospital'=>1,
          'stdel'=>0
          ],


          [
          'id_group_barcode'=>6,
          'group_barcode_name'=>'NAF Blood',
          'id_hospital'=>1,
          'stdel'=>0
          ],


          [
          'id_group_barcode'=>7,
          'group_barcode_name'=>'Lithium Heparin Blood',
          'id_hospital'=>1,
          'stdel'=>0
          ]


        ]);


    }
}
