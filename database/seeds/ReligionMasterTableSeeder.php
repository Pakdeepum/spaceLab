<?php

use Illuminate\Database\Seeder;

class ReligionMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('religion_master')->delete();
        if($SeedEngVer){
          \DB::table('religion_master')->insert(array (
              0 =>
              array (
                  'id_religion' => 1,
                  'religion_name' => 'Buddhism',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_religion' => 2,
                  'religion_name' => 'Islam',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_religion' => 3,
                  'religion_name' => 'Christianity',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_religion' => 4,
                  'religion_name' => 'Hinduism',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_religion' => 5,
                  'religion_name' => 'Jainism',
                  'stdel' => 0,
              ),
              5 =>
              array (
                  'id_religion' => 6,
                  'religion_name' => 'Sikhism',
                  'stdel' => 0,
              ),
              6 =>
              array (
                  'id_religion' => 7,
                  'religion_name' => 'Taoism',
                  'stdel' => 0,
              ),
              7 =>
              array (
                  'id_religion' => 8,
                  'religion_name' => 'Confucianism',
                  'stdel' => 0,
              ),
              8 =>
              array (
                  'id_religion' => 9,
                  'religion_name' => 'Buakaoism',
                  'stdel' => 0,
              ),
              9 =>
              array (
                  'id_religion' => 10,
                  'religion_name' => 'Xiāntiān Dào',
                  'stdel' => 0,
              ),
              10 =>
              array (
                  'id_religion' => 11,
                  'religion_name' => 'Yīguàn Dào',
                  'stdel' => 1,
              ),
              11 =>
              array (
                  'id_religion' => 12,
                  'religion_name' => 'Shintoism',
                  'stdel' => 0,
              ),
              12 =>
              array (
                  'id_religion' => 13,
                  'religion_name' => 'Cheondoism',
                  'stdel' => 0,
              ),
              13 =>
              array (
                  'id_religion' => 14,
                  'religion_name' => 'Tenrikeism',
                  'stdel' => 0,
              ),
              14 =>
              array (
                  'id_religion' => 15,
                  'religion_name' => 'Ancient Eygptism',
                  'stdel' => 0,
              ),
              15 =>
              array (
                  'id_religion' => 16,
                  'religion_name' => 'Manichaeism',
                  'stdel' => 0,
              ),
              16 =>
              array (
                  'id_religion' => 17,
                  'religion_name' => 'Judaism',
                  'stdel' => 0,
              ),
              17 =>
              array (
                  'id_religion' => 18,
                  'religion_name' => 'Zoroastrianism',
                  'stdel' => 0,
              ),
              18 =>
              array (
                  'id_religion' => 19,
                  'religion_name' => 'Babism',
                  'stdel' => 0,
              ),
              19 =>
              array (
                  'id_religion' => 20,
                  'religion_name' => 'Bahai Faith',
                  'stdel' => 0,
              ),
              20 =>
              array (
                  'id_religion' => 21,
                  'religion_name' => 'Shenism',
                  'stdel' => 0,
              ),
          ));
        }else{
          \DB::table('religion_master')->insert(array (
              0 =>
              array (
                  'id_religion' => 1,
                  'religion_name' => 'พุทธ',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_religion' => 2,
                  'religion_name' => 'อิสลาม',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_religion' => 3,
                  'religion_name' => 'คริสต์',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_religion' => 4,
                  'religion_name' => 'ฮินดู',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_religion' => 5,
                  'religion_name' => 'เชน',
                  'stdel' => 0,
              ),
              5 =>
              array (
                  'id_religion' => 6,
                  'religion_name' => 'ซิกข์',
                  'stdel' => 0,
              ),
              6 =>
              array (
                  'id_religion' => 7,
                  'religion_name' => 'เต๋า',
                  'stdel' => 0,
              ),
              7 =>
              array (
                  'id_religion' => 8,
                  'religion_name' => 'ขงจื๊อ',
                  'stdel' => 0,
              ),
              8 =>
              array (
                  'id_religion' => 9,
                  'religion_name' => 'บัวขาว',
                  'stdel' => 0,
              ),
              9 =>
              array (
                  'id_religion' => 10,
                  'religion_name' => 'เซียนเทียนเต้า',
                  'stdel' => 0,
              ),
              10 =>
              array (
                  'id_religion' => 11,
                  'religion_name' => 'อนุตตรธรรม',
                  'stdel' => 0,
              ),
              11 =>
              array (
                  'id_religion' => 12,
                  'religion_name' => 'ชินโต',
                  'stdel' => 0,
              ),
              12 =>
              array (
                  'id_religion' => 13,
                  'religion_name' => 'ชอนโดเกียว',
                  'stdel' => 0,
              ),
              13 =>
              array (
                  'id_religion' => 14,
                  'religion_name' => 'เทนริเกียว',
                  'stdel' => 0,
              ),
              14 =>
              array (
                  'id_religion' => 15,
                  'religion_name' => 'อียิปต์โบราณ',
                  'stdel' => 0,
              ),
              15 =>
              array (
                  'id_religion' => 16,
                  'religion_name' => 'มาณีกี',
                  'stdel' => 0,
              ),
              16 =>
              array (
                  'id_religion' => 17,
                  'religion_name' => 'ยูดาห์',
                  'stdel' => 0,
              ),
              17 =>
              array (
                  'id_religion' => 18,
                  'religion_name' => 'โซโรอัสเตอร์',
                  'stdel' => 0,
              ),
              18 =>
              array (
                  'id_religion' => 19,
                  'religion_name' => 'บาบี',
                  'stdel' => 0,
              ),
              19 =>
              array (
                  'id_religion' => 20,
                  'religion_name' => 'บาไฮ',
                  'stdel' => 0,
              ),
              20 =>
              array (
                  'id_religion' => 21,
                  'religion_name' => 'พื้นบ้านจีน',
                  'stdel' => 0,
              ),
          ));
        }



    }
}
