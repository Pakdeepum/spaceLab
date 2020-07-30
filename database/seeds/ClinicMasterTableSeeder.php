<?php

use Illuminate\Database\Seeder;

class ClinicMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('clinic_master')->delete();
        if($SeedEngVer){
          \DB::table('clinic_master')->insert([
            [
            'id_clinic'=>1,
            'clinic_code'=>'0001',
            'clinic_name'=>'Diabetes Clinic',
            'clinic_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_clinic'=>2,
            'clinic_code'=>'0002',
            'clinic_name'=>'Pressure Clinic',
            'clinic_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_clinic'=>3,
            'clinic_code'=>'0003',
            'clinic_name'=>'Fat Clinic',
            'clinic_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }else{
          \DB::table('clinic_master')->insert([
            [
            'id_clinic'=>1,
            'clinic_code'=>'0001',
            'clinic_name'=>'คลินิกเบาหวาน',
            'clinic_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_clinic'=>2,
            'clinic_code'=>'0002',
            'clinic_name'=>'คลินิกความดัน',
            'clinic_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_clinic'=>3,
            'clinic_code'=>'0003',
            'clinic_name'=>'คลินิกไขมัน',
            'clinic_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }

    }
}
