<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$soK89SdWb7gTe0G8sDQzguPtCwrhFvreQbP78s6K1hEyx618cO4xm',
                'remember_token' => NULL,
                'created_at' => '2018-09-11 05:35:15',
                'updated_at' => '2018-09-11 05:35:15',
                'username' => 'admin',
                'prefix_name' => NULL,
                'fname' => NULL,
                'lastname' => NULL,
                'position' => NULL,
                'user_department' => NULL,
                'regis_date' => NULL,
                'user_pic_url' => NULL,
                'id_group_user' => NULL,
                'stdel' => NULL,
                'id_hospital' => NULL,
            ),
        ));
        
        
    }
}