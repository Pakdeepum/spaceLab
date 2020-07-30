<?php

use Illuminate\Database\Seeder;

class MenuMasterDataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('menu_master_data')->delete();
        if($SeedEngVer){
          \DB::table('menu_master_data')->insert([
          [
          'id_menu_data'=>1,
          'menu_name'=>'Receive Lab',
          'menu_tag'=>'1'
          ],



          [
          'id_menu_data'=>2,
          'menu_name'=>'Lab Result Record',
          'menu_tag'=>'2'
          ],



          [
          'id_menu_data'=>3,
          'menu_name'=>'Lab Result History',
          'menu_tag'=>'3'
          ],



          [
          'id_menu_data'=>4,
          'menu_name'=>'Lab Result Copy Scan',
          'menu_tag'=>'4'
          ],



          [
          'id_menu_data'=>5,
          'menu_name'=>'Lab Result Document Photo',
          'menu_tag'=>'5'
          ],



          [
          'id_menu_data'=>6,
          'menu_name'=>'Change Password',
          'menu_tag'=>'6'
          ],



          [
          'id_menu_data'=>7,
          'menu_name'=>'User Management',
          'menu_tag'=>'7'
          ],



          [
          'id_menu_data'=>8,
          'menu_name'=>'Data Management',
          'menu_tag'=>'8'
          ],



          [
          'id_menu_data'=>9,
          'menu_name'=>'Menu Management',
          'menu_tag'=>'9'
          ],



          [
          'id_menu_data'=>10,
          'menu_name'=>'File Uplooad',
          'menu_tag'=>'10'
          ],



          [
          'id_menu_data'=>11,
          'menu_name'=>'config',
          'menu_tag'=>'11'
          ],



          [
          'id_menu_data'=>12,
          'menu_name'=>'itemcode',
          'menu_tag'=>'12'
          ],



          [
          'id_menu_data'=>13,
          'menu_name'=>'logfile',
          'menu_tag'=>'13'
          ],



          [
          'id_menu_data'=>14,
          'menu_name'=>'login',
          'menu_tag'=>'14'
          ],



          [
          'id_menu_data'=>15,
          'menu_name'=>'QC Config',
          'menu_tag'=>'15'
          ],



          [
          'id_menu_data'=>16,
          'menu_name'=>'QC Input',
          'menu_tag'=>'16'
          ],



          [
          'id_menu_data'=>17,
          'menu_name'=>'QC Setup',
          'menu_tag'=>'17'
          ],



          [
          'id_menu_data'=>18,
          'menu_name'=>'QC Viewer',
          'menu_tag'=>'18'
          ],



          [
          'id_menu_data'=>20,
          'menu_name'=>'LIS Report',
          'menu_tag'=>'20'
          ],



          [
          'id_menu_data'=>21,
          'menu_name'=>'Patient Management',
          'menu_tag'=>'21'
          ],



          [
          'id_menu_data'=>22,
          'menu_name'=>'Doctor Management',
          'menu_tag'=>'22'
          ],



          [
          'id_menu_data'=>23,
          'menu_name'=>'Lab Item Data Management',
          'menu_tag'=>'23'
        ]
        ]);
        }else{
          \DB::table('menu_master_data')->insert(array (
              0 =>
              array (
                  'id_menu_data' => 1,
                  'menu_name' => 'รับสิ่งส่งตรวจ',
                  'menu_tag' => '1',
              ),
              1 =>
              array (
                  'id_menu_data' => 2,
                  'menu_name' => 'ลงผลตรวจ',
                  'menu_tag' => '2',
              ),
              2 =>
              array (
                  'id_menu_data' => 3,
                  'menu_name' => 'ย้อนดูผลตรวจ',
                  'menu_tag' => '3',
              ),
              3 =>
              array (
                  'id_menu_data' => 4,
                  'menu_name' => 'สำเนาผลตรวจ',
                  'menu_tag' => '4',
              ),
              4 =>
              array (
                  'id_menu_data' => 5,
                  'menu_name' => 'ผลตรวจรูปภาพ',
                  'menu_tag' => '5',
              ),
              5 =>
              array (
                  'id_menu_data' => 6,
                  'menu_name' => 'เปลี่ยนรหัสผ่าน',
                  'menu_tag' => '6',
              ),
              6 =>
              array (
                  'id_menu_data' => 7,
                  'menu_name' => 'จัดการผู้ใช้',
                  'menu_tag' => '7',
              ),
              7 =>
              array (
                  'id_menu_data' => 8,
                  'menu_name' => 'จัดการข้อมูล',
                  'menu_tag' => '8',
              ),
              8 =>
              array (
                  'id_menu_data' => 9,
                  'menu_name' => 'จัดการเมนู',
                  'menu_tag' => '9',
              ),
              9 =>
              array (
                  'id_menu_data' => 10,
                  'menu_name' => 'อัพโหลดไฟล์',
                  'menu_tag' => '10',
              ),
              10 =>
              array (
                  'id_menu_data' => 11,
                  'menu_name' => 'config',
                  'menu_tag' => '11',
              ),
              11 =>
              array (
                  'id_menu_data' => 12,
                  'menu_name' => 'itemcode',
                  'menu_tag' => '12',
              ),
              12 =>
              array (
                  'id_menu_data' => 13,
                  'menu_name' => 'logfile',
                  'menu_tag' => '13',
              ),
              13 =>
              array (
                  'id_menu_data' => 14,
                  'menu_name' => 'login',
                  'menu_tag' => '14',
              ),
              14 =>
              array (
                  'id_menu_data' => 15,
                  'menu_name' => 'QC Config',
                  'menu_tag' => '15',
              ),
              15 =>
              array (
                  'id_menu_data' => 16,
                  'menu_name' => 'QC Input',
                  'menu_tag' => '16',
              ),
              16 =>
              array (
                  'id_menu_data' => 17,
                  'menu_name' => 'QC Setup',
                  'menu_tag' => '17',
              ),
              17 =>
              array (
                  'id_menu_data' => 18,
                  'menu_name' => 'QC Viewer',
                  'menu_tag' => '18',
              ),
              18 =>
              array (
                  'id_menu_data' => 20,
                  'menu_name' => 'รายงาน LIS',
                  'menu_tag' => '20',
              ),
              /*19 =>
              array (
                  'id_menu_data' => 19,
                  'menu_name' => 'รายงาน his',
                  'menu_tag' => '19',
              ),*/
              20 =>
              array (
                  'id_menu_data' => 21,
                  'menu_name' => 'จัดการผู้ป่วย',
                  'menu_tag' => '21',
              ),
              21 =>
              array (
                  'id_menu_data' => 22,
                  'menu_name' => 'จัดการข้อมูลแพทย์',
                  'menu_tag' => '22',
              ),
              22 =>
              array (
                  'id_menu_data' => 23,
                  'menu_name' => 'จัดการข้อมูล Lab Item',
                  'menu_tag' => '23',
              ),
          ));

        }


    }
}
