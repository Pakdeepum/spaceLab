<?php

use Illuminate\Database\Seeder;

class QcLevelMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('qc_level_master')->delete();

        \DB::table('qc_level_master')->insert(array (
            0 =>
            array (
                'id_qc_level' => 1,
                'qc_level' => 'level1',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
            1 =>
            array (
                'id_qc_level' => 2,
                'qc_level' => 'level2',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
            2 =>
            array (
                'id_qc_level' => 3,
                'qc_level' => 'level3',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
        ));


    }
}
