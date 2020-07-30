<?php

use Illuminate\Database\Seeder;

class ProfileQcMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('profile_qc_master')->delete();

        \DB::table('profile_qc_master')->insert([
        [
        'id_profile_qc'=>1,
        'profile_name'=>'LYPHO L1',
        'id_department'=>1,
        'id_qc_name'=>1,
        'id_qc_level'=>1,
        'lot_number'=>'26431',
        'id_user_create'=>1,
        'date_create'=>'2019-04-03 12:05:49',
        'id_user_modify'=>NULL,
        'date_modify'=>NULL,
        'stdel'=>0,
        'id_hospital'=>1
        ],
         [
        'id_profile_qc'=>2,
        'profile_name'=>'LYPHO L2',
        'id_department'=>1,
        'id_qc_name'=>3,
        'id_qc_level'=>2,
        'lot_number'=>'26432',
        'id_user_create'=>1,
        'date_create'=>'2019-04-03 12:06:40',
        'id_user_modify'=>NULL,
        'date_modify'=>NULL,
        'stdel'=>0,
        'id_hospital'=>1
        ],
        [
        'id_profile_qc'=>3,
        'profile_name'=>'LYPHO L3',
        'id_department'=>1,
        'id_qc_name'=>4,
        'id_qc_level'=>3,
        'lot_number'=>'26433',
        'id_user_create'=>1,
        'date_create'=>'2019-04-06 15:35:26',
        'id_user_modify'=>NULL,
        'date_modify'=>NULL,
        'stdel'=>0,
        'id_hospital'=>1
        ]
        ]);


    }
}
