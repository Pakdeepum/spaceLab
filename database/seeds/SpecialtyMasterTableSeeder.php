<?php

use Illuminate\Database\Seeder;

class SpecialtyMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('specialty_master')->delete();
        if($SeedEngVer){
          \DB::table('specialty_master')->insert([
            [
              'id_specialty'=>1,
              'specialty_name'=>'Specialist Doctor',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>2,
              'specialty_name'=>'Anesthesiologist',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>3,
              'specialty_name'=>'Radiologic Technologist',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>4,
              'specialty_name'=>'Medical Technologist',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>5,
              'specialty_name'=>'Medical Science Officer',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>6,
              'specialty_name'=>'Nurse',
              'stdel'=>0,
              'id_hospital'=>1
              ]

          ]);

        }else{
          \DB::table('specialty_master')->insert([
            [
              'id_specialty'=>1,
              'specialty_name'=>'แพทย์ผู้ชำนาญการ',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>2,
              'specialty_name'=>'วิสัญญีแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>3,
              'specialty_name'=>'นักรังสีการแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>4,
              'specialty_name'=>'เทคนิคการแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>5,
              'specialty_name'=>'เจ้าพนักงานวิทยาศาสตร์การแพทย์',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_specialty'=>6,
              'specialty_name'=>'พยาบาล',
              'stdel'=>0,
              'id_hospital'=>1
              ]


          ]);


        }

    }
}
