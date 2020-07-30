<?php

use Illuminate\Database\Seeder;

class ServicePlanMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('service_plan_master')->delete();
        if($SeedEngVer){
          \DB::table('service_plan_master')->insert([
            [
              'id_service_plan'=>1,
              'service_plan_name'=>'Universal Health Insurance Card',
              'service_plan_note'=>'',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>2,
              'service_plan_name'=>'Social Security Card',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>3,
              'service_plan_name'=>'Life Insurance Card',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>4,
              'service_plan_name'=>'Pass Card',
              'service_plan_note'=>NULL,
              'stdel'=>1,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>5,
              'service_plan_name'=>'Cash',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ]


          ]);

        }else{
          \DB::table('service_plan_master')->insert([
            [
              'id_service_plan'=>1,
              'service_plan_name'=>'บัตรทอง',
              'service_plan_note'=>'',
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>2,
              'service_plan_name'=>'ประกันสังคม',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>3,
              'service_plan_name'=>'ประกันชีวิต',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>4,
              'service_plan_name'=>'บัตรผ่าน',
              'service_plan_note'=>NULL,
              'stdel'=>1,
              'id_hospital'=>1
              ],



              [
              'id_service_plan'=>5,
              'service_plan_name'=>'เงินสด',
              'service_plan_note'=>NULL,
              'stdel'=>0,
              'id_hospital'=>1
              ]


          ]);

        }


    }
}
