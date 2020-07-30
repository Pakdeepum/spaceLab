<?php

use Illuminate\Database\Seeder;

class WardTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('ward')->delete();
        if(!$SeedEngVer){
          \DB::table('ward')->insert([
            [
              'id_ward'=>1,
              'ward_name'=>'IPD กุมารเวช',
              'ward_code'=>'0001',
              'id_hospital'=>1,
              'stdel'=>0
              ],



              [
              'id_ward'=>2,
              'ward_name'=>'IPD อายุรกรรม',
              'ward_code'=>'0002',
              'id_hospital'=>1,
              'stdel'=>0
              ],



              [
              'id_ward'=>3,
              'ward_name'=>'IPD ศัลยกรรม',
              'ward_code'=>'0003',
              'id_hospital'=>1,
              'stdel'=>0
              ]


          ]);
        }else{
          \DB::table('ward')->insert([
            [
              'id_ward'=>1,
              'ward_name'=>'Pediatrics IPD',
              'ward_code'=>'0001',
              'id_hospital'=>1,
              'stdel'=>0
              ],



              [
              'id_ward'=>2,
              'ward_name'=>'Medicine IPD',
              'ward_code'=>'0002',
              'id_hospital'=>1,
              'stdel'=>0
              ],



              [
              'id_ward'=>3,
                'ward_name'=>'Surgery IPD',
              'ward_code'=>'0003',
              'id_hospital'=>1,
              'stdel'=>0
              ]


          ]);
        }


    }
}
