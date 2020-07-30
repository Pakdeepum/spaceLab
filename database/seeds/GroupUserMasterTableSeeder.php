<?php

use Illuminate\Database\Seeder;

class GroupUserMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('group_user_master')->delete();
        
        \DB::table('group_user_master')->insert(array (
            0 => 
            array (
                'id_group_user' => 1,
                'group_user_name' => 'Admin',
                'stdel' => 0,
                'id_hospital' => 0,
            ),
            1 => 
            array (
                'id_group_user' => 2,
                'group_user_name' => 'Operation',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
            2 => 
            array (
                'id_group_user' => 3,
                'group_user_name' => 'Specialist',
                'stdel' => 0,
                'id_hospital' => 1,
            ),
        ));       
    }
}