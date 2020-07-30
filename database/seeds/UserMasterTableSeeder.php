<?php

use Illuminate\Database\Seeder;

class UserMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('user_master')->delete();

        \DB::table('user_master')->insert([
          [
          'id_user'=>1,
          'username'=>'admin',
          'password'=>'21232f297a57a5a743894a0e4a801fc3',
          'prefix_name'=>1,
          'fname'=>'admin',
          'lastname'=>'',
          'position'=>1,
          'user_department'=>1,
          'regis_date'=>'2018-09-11 12:58:11',
          'user_pic_url'=>NULL,
          'id_group_user'=>1,
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_user'=>2,
          'username'=>'boom',
          'password'=>'81dc9bdb52d04dc20036dbd8313ed055',
          'prefix_name'=>1,
          'fname'=>'Boom',
          'lastname'=>'H',
          'position'=>1,
          'user_department'=>3,
          'regis_date'=>'2019-04-23 13:26:01',
          'user_pic_url'=>NULL,
          'id_group_user'=>3,
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_user'=>3,
          'username'=>'kengspb',
          'password'=>'519f565c9f4e1e0fecdf956723721242',
          'prefix_name'=>4,
          'fname'=>'keng',
          'lastname'=>'norsuwan',
          'position'=>1,
          'user_department'=>4,
          'regis_date'=>'2019-04-23 14:43:32',
          'user_pic_url'=>NULL,
          'id_group_user'=>3,
          'stdel'=>0,
          'id_hospital'=>1
          ],



          [
          'id_user'=>4,
          'username'=>'USA',
          'password'=>'c4ca4238a0b923820dcc509a6f75849b',
          'prefix_name'=>5,
          'fname'=>'USA',
          'lastname'=>'T',
          'position'=>1,
          'user_department'=>3,
          'regis_date'=>'2019-04-23 21:04:31',
          'user_pic_url'=>NULL,
          'id_group_user'=>3,
          'stdel'=>0,
          'id_hospital'=>4
          ]
        ]);

    }
}
