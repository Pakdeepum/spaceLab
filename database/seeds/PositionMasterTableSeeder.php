<?php

use Illuminate\Database\Seeder;

class PositionMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('position_master')->delete();
        if($SeedEngVer){
          \DB::table('position_master')->insert([
            [
              'id_position'=>1,
              'position_name'=>'Supervisor',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>2,
              'position_name'=>'Medical Technologist',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>3,
              'position_name'=>'Medical Science Officer',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>4,
              'position_name'=>'Nurse',
              'stdel'=>0,
              'id_hospital'=>1
              ]
          ]);
        }else{
          \DB::table('position_master')->insert([
            [
              'id_position'=>1,
              'position_name'=>'หัวหน้างาน',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>2,
              'position_name'=>'นักเทคนิคการแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>3,
              'position_name'=>'เจ้าพนักงานวิทยาศาสตร์การแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_position'=>4,
              'position_name'=>'พยาบาล',
              'stdel'=>0,
              'id_hospital'=>1
              ]
          ]);
        }



    }
}
