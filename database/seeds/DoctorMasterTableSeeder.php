<?php

use Illuminate\Database\Seeder;

class DoctorMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('doctor_master')->delete();
        if($SeedEngVer){
          \DB::table('doctor_master')->insert(array (
              0 =>
              array (
                  'id_doctor' => 1,
                  'doctor_prefix' => 5,
                  'doctor_name' => 'Mormai',
                  'doctor_lastname' => 'Mordee',
                  'doctor_department' => '1',
                  'doctor_position' => 2,
                  'doctor_tel' => '0524441524',
                  'stdel' => 0,
                  'doctor_specialty' => 1,
                  'id_hospital' => 1,
              ),
              1 =>
              array (
                  'id_doctor' => 2,
                  'doctor_prefix' => 4,
                  'doctor_name' => 'Wandee',
                  'doctor_lastname' => 'Srichiangmai่',
                  'doctor_department' => '1',
                  'doctor_position' => 2,
                  'doctor_tel' => '0839422155',
                  'stdel' => 0,
                  'doctor_specialty' => 1,
                  'id_hospital' => 1,
              ),
          ));
        }else{
          \DB::table('doctor_master')->insert(array (
              0 =>
              array (
                  'id_doctor' => 1,
                  'doctor_prefix' => 5,
                  'doctor_name' => 'หมอใหม่',
                  'doctor_lastname' => 'หมอดี',
                  'doctor_department' => '1',
                  'doctor_position' => 2,
                  'doctor_tel' => '0524441524',
                  'stdel' => 0,
                  'doctor_specialty' => 1,
                  'id_hospital' => 1,
              ),
              1 =>
              array (
                  'id_doctor' => 2,
                  'doctor_prefix' => 4,
                  'doctor_name' => 'วัลย์ดีย์',
                  'doctor_lastname' => 'ศรีเชียงใหม่',
                  'doctor_department' => '1',
                  'doctor_position' => 2,
                  'doctor_tel' => '0839422155',
                  'stdel' => 0,
                  'doctor_specialty' => 1,
                  'id_hospital' => 1,
              ),
          ));
        }



    }
}
