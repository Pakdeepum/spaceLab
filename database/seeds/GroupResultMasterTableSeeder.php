<?php

use Illuminate\Database\Seeder;

class GroupResultMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('group_result_master')->delete();

        \DB::table('group_result_master')->insert([
          [
          'id_group_result'=>1,
          'group_result_name'=>'ROUTINE CHEMISTRY',
          'id_hospital'=>1,
          'stdel'=>0
          ],



          [
          'id_group_result'=>2,
          'group_result_name'=>'SPECIFIC CHEMISTRY',
          'id_hospital'=>1,
          'stdel'=>0
          ],



          [
          'id_group_result'=>3,
          'group_result_name'=>'CBC+DIFF',
          'id_hospital'=>1,
          'stdel'=>0
          ],



          [
          'id_group_result'=>4,
          'group_result_name'=>'CBC',
          'id_hospital'=>1,
          'stdel'=>0
          ],



          [
          'id_group_result'=>5,
          'group_result_name'=>'IMMUNOLOGY',
          'id_hospital'=>1,
          'stdel'=>0
          ]
          ]);


    }
}
