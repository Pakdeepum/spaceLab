<?php

use Illuminate\Database\Seeder;

class PatientTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('patient_type')->delete();
        if($SeedEngVer){
          \DB::table('patient_type')->insert([
            [
            'id_patient_type'=>1,
            'patient_type_name'=>'OutPatient',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>2,
            'patient_type_name'=>'Emergency Patient',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>3,
            'patient_type_name'=>'Sended Patient',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>4,
            'patient_type_name'=>'InPatient',
            'patient_type_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }else{
          \DB::table('patient_type')->insert([
            [
            'id_patient_type'=>1,
            'patient_type_name'=>'ผู้ป่วยนอก',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>2,
            'patient_type_name'=>'ผู้ป่วยฉุกเฉิน',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>3,
            'patient_type_name'=>'ผู้ป่วยส่งตัว',
            'patient_type_note'=>NULL,
            'stdel'=>0,
            'id_hospital'=>1
            ],



            [
            'id_patient_type'=>4,
            'patient_type_name'=>'ผู้ป่วยใน',
            'patient_type_note'=>'',
            'stdel'=>0,
            'id_hospital'=>1
            ]
          ]);

        }


    }
}
