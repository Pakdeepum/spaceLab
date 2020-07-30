<?php

use Illuminate\Database\Seeder;

class HospitalMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('hospital_master')->delete();
        if($SeedEngVer){
          \DB::table('hospital_master')->insert(array (
              0 =>
              array (
                  'id_hospital' => 1,
                  'hn_hospital' => 'HN000001',
                  'hospital_name' => 'Suanprung Hospital',
                  'hospital_address' => 'Chiangmai',
                  'hospital_tel' => '08394514424',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_hospital' => 2,
                  'hn_hospital' => 'HN000002',
                  'hospital_name' => 'Suandok Hospital',
                  'hospital_address' => 'Chiangmai',
                  'hospital_tel' => '0215488452',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_hospital' => 3,
                  'hn_hospital' => 'HN000003',
                  'hospital_name' => 'Small Animal Hospital',
                  'hospital_address' => 'Chiangmai',
                  'hospital_tel' => '0002154545',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_hospital' => 4,
                  'hn_hospital' => 'HN000010',
                  'hospital_name' => 'Largel Animal Hospital',
                  'hospital_address' => 'Chiangmai',
                  'hospital_tel' => '0254156156',
                  'stdel' => 0,
              ),
          ));
        }else{
          \DB::table('hospital_master')->insert(array (
              0 =>
              array (
                  'id_hospital' => 1,
                  'hn_hospital' => 'HN000001',
                  'hospital_name' => 'โรงพยาบาลสวนปรุง',
                  'hospital_address' => 'เชียงใหม่',
                  'hospital_tel' => '08394514424',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_hospital' => 2,
                  'hn_hospital' => 'HN000002',
                  'hospital_name' => 'โรงพยาบาลสวนดอก',
                  'hospital_address' => 'เชียงใหม่',
                  'hospital_tel' => '0215488452',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_hospital' => 3,
                  'hn_hospital' => 'HN000003',
                  'hospital_name' => 'โรงพยาบาลสัตว์เล็ก',
                  'hospital_address' => 'เชียงใหม่',
                  'hospital_tel' => '0002154545',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_hospital' => 4,
                  'hn_hospital' => 'HN000010',
                  'hospital_name' => 'โรงพยาบาลสัตว์ใหญ่',
                  'hospital_address' => 'เชียงใหม่',
                  'hospital_tel' => '0254156156',
                  'stdel' => 0,
              ),
          ));
        }



    }
}
