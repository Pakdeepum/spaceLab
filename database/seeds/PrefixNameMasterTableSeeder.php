<?php

use Illuminate\Database\Seeder;

class PrefixNameMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('prefix_name_master')->delete();
        if($SeedEngVer){
          \DB::table('prefix_name_master')->insert(array (
            0 =>
            array (
                'id_prefix' => 1,
                'prefix_name' => 'Mr.',
                'stdel' => 0,
            ),
            1 =>
            array (
                'id_prefix' => 2,
                'prefix_name' => 'Mrs.',
                'stdel' => 0,
            ),
            2 =>
            array (
                'id_prefix' => 3,
                'prefix_name' => 'Miss.',
                'stdel' => 0,
            ),
            3 =>
            array (
                'id_prefix' => 4,
                'prefix_name' => 'Dr.',
                'stdel' => 0,
            ),
            4 =>
            array (
                'id_prefix' => 5,
                'prefix_name' => 'Dr.',
                'stdel' => 0,
            ),
        ));

        }else{
          \DB::table('prefix_name_master')->insert(array (
              0 =>
              array (
                  'id_prefix' => 1,
                  'prefix_name' => 'นาย',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_prefix' => 2,
                  'prefix_name' => 'นาง',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_prefix' => 3,
                  'prefix_name' => 'นางสาว',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_prefix' => 4,
                  'prefix_name' => 'ดร.',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_prefix' => 5,
                  'prefix_name' => 'ทพ',
                  'stdel' => 0,
              ),
          ));

        }



    }
}
