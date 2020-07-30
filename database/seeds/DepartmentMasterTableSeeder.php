<?php

use Illuminate\Database\Seeder;

class DepartmentMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('department_master')->delete();
        if($SeedEngVer){
          \DB::table('department_master')->insert([
            [
            'id_department'=>1,
            'department_name'=>'IPD',
            'department_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>2,
            'department_name'=>'Emergency',
            'department_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>3,
            'department_name'=>'OPD',
            'department_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>4,
            'department_name'=>'LAB',
            'department_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }else{
          \DB::table('department_master')->insert([
            [
            'id_department'=>1,
            'department_name'=>'IPD',
            'department_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>2,
            'department_name'=>'ฉุกเฉิน',
            'department_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>3,
            'department_name'=>'OPD',
            'department_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_department'=>4,
            'department_name'=>'LAB',
            'department_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }

    }
}
