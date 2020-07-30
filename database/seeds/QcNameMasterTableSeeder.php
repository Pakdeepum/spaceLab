<?php

use Illuminate\Database\Seeder;

class QcNameMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('qc_name_master')->delete();

        \DB::table('qc_name_master')->insert(array (
            0 =>
            array (
                'id_qc_name' => 1,
                'qc_name' => 'LYPHO L1',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
            1 =>
            array (
                'id_qc_name' => 2,
                'qc_name' => 'name1',
                'stdel' => 1,
                'id_hospital' => 1,
            ),
            2 =>
            array (
                'id_qc_name' => 3,
                'qc_name' => 'LYPHO L2',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
            3 =>
            array (
                'id_qc_name' => 4,
                'qc_name' => 'LYPHO L3',
                'stdel' => 0,
                'id_hospital' => 1,
            )
        ));


    }
}
