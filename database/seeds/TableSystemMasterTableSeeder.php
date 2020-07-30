<?php

use Illuminate\Database\Seeder;

class TableSystemMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('table_system_master')->delete();
        if(!$SeedEngVer){
          \DB::table('table_system_master')->insert(array (
              0 =>
              array (
                  'id_table' => 1,
                  'table_name_show' => 'ข้อมูลแพทย์',
                  'table_name_use' => 'doctor_master',
                  'stdel' => 1,
              ),
              1 =>
              array (
                  'id_table' => 2,
                  'table_name_show' => 'ข้อมูลความชำนาญการ',
                  'table_name_use' => 'specialty_master',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_table' => 3,
                  'table_name_show' => 'ข้อมูลผู้ป่วย',
                  'table_name_use' => 'patient_master',
                  'stdel' => 1,
              ),
              3 =>
              array (
                  'id_table' => 4,
                  'table_name_show' => 'ข้อมูลตำแหน่งงาน',
                  'table_name_use' => 'position_master',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_table' => 7,
                  'table_name_show' => 'ข้อมูลสิ่งส่งตรวจ',
                  'table_name_use' => 'lab_specimen_item_master',
                  'stdel' => 0,
              ),
              5 =>
              array (
                  'id_table' => 6,
                  'table_name_show' => 'ข้อมูลเชื้อชาตื',
                  'table_name_use' => 'ethnicity_master',
                  'stdel' => 1,
              ),
              6 =>
              array (
                  'id_table' => 8,
                  'table_name_show' => 'ข้อมูลสัญชาติ',
                  'table_name_use' => 'nationality_master',
                  'stdel' => 1,
              ),
              7 =>
              array (
                  'id_table' => 9,
                  'table_name_show' => 'ข้อมูลศาสนา',
                  'table_name_use' => 'religion_master',
                  'stdel' => 1,
              ),
              8 =>
              array (
                  'id_table' => 10,
                  'table_name_show' => 'ข้อมูลโรงพยาบาล',
                  'table_name_use' => 'hospital_master',
                  'stdel' => 0,
              ),
              9 =>
              array (
                  'id_table' => 11,
                  'table_name_show' => 'ข้อมูลแผนก',
                  'table_name_use' => 'department_master',
                  'stdel' => 0,
              ),
              10 =>
              array (
                  'id_table' => 12,
                  'table_name_show' => 'ข้อมูลประเภทผู้ป่วย',
                  'table_name_use' => 'patient_type',
                  'stdel' => 0,
              ),
              11 =>
              array (
                  'id_table' => 18,
                  'table_name_show' => 'ข้อมูลชื่อ QC',
                  'table_name_use' => 'qc_name_master',
                  'stdel' => 0,
              ),
              12 =>
              array (
                  'id_table' => 19,
                  'table_name_show' => 'ข้อมูล level QC',
                  'table_name_use' => 'qc_level_master',
                  'stdel' => 0,
              ),
              13 =>
              array (
                  'id_table' => 20,
                  'table_name_show' => 'ข้อมูลกลุ่มตรวจ',
                  'table_name_use' => 'lab_sub_group_item_master',
                  'stdel' => 0,
              ),
              14 =>
              array (
                  'id_table' => 21,
                  'table_name_show' => 'ข้อมูลรายการตรวจ',
                  'table_name_use' => 'lab_item_master',
                  'stdel' => 0,
              ),
              15 =>
              array (
                  'id_table' => 22,
                  'table_name_show' => 'ข้อมูลแบบฟอร์มการตรวจ',
                  'table_name_use' => 'form_lab_master',
                  'stdel' => 1,
              ),
              16 =>
              array (
                  'id_table' => 13,
                  'table_name_show' => 'ข้อมูล ward',
                  'table_name_use' => 'ward',
                  'stdel' => 0,
              ),
              17 =>
              array (
                  'id_table' => 23,
                  'table_name_show' => 'ข้อมูลประเภท Item Type',
                  'table_name_use' => 'lab_item_type_master',
                  'stdel' => 0,
              ),
              18 =>
              array (
                  'id_table' => 24,
                  'table_name_show' => 'ข้อมูล Group Barcode',
                  'table_name_use' => 'group_barcode_master',
                  'stdel' => 0,
              ),
              19 =>
              array (
                  'id_table' => 25,
                  'table_name_show' => 'ข้อมูล Group Result',
                  'table_name_use' => 'group_result_master',
                  'stdel' => 0,
              ),
              20 =>
              array (
                  'id_table' => 26,
                  'table_name_show' => 'ข้อมูล Lab Barcode',
                  'table_name_use' => 'lab_barcode_master',
                  'stdel' => 0,
              ),
              21 =>
              array (
                  'id_table' => 28,
                  'table_name_show' => 'ข้อมูลกลุ่มผู้ใช้',
                  'table_name_use' => 'group_user_master',
                  'stdel' => 0,
              ),
              22 =>
              array (
                  'id_table' => 29,
                  'table_name_show' => 'ข้อมูล Clinic',
                  'table_name_use' => 'clinic_master',
                  'stdel' => 0,
              ),
              23 =>
              array (
                  'id_table' => 30,
                  'table_name_show' => 'ข้อมูลสิทธิการรักษา',
                  'table_name_use' => 'service_plan_master',
                  'stdel' => 0,
              ),
          ));
        }else{
          \DB::table('table_system_master')->insert([
                  [
          'id_table'=>1,
          'table_name_show'=>'Doctor Information',
          'table_name_use'=>'doctor_master',
          'stdel'=>1
          ],



          [
          'id_table'=>2,
          'table_name_show'=>'Expertise Information',
          'table_name_use'=>'specialty_master',
          'stdel'=>0
          ],



          [
          'id_table'=>3,
          'table_name_show'=>'Patient Information',
          'table_name_use'=>'patient_master',
          'stdel'=>1
          ],



          [
          'id_table'=>4,
          'table_name_show'=>'Job Position Information',
          'table_name_use'=>'position_master',
          'stdel'=>0
          ],



          [
          'id_table'=>6,
          'table_name_show'=>'Ethnic information',
          'table_name_use'=>'ethnicity_master',
          'stdel'=>1
          ],



          [
          'id_table'=>7,
          'table_name_show'=>'Lab Specimen Information',
          'table_name_use'=>'lab_specimen_item_master',
          'stdel'=>0
          ],



          [
          'id_table'=>8,
          'table_name_show'=>'Nationality Information',
          'table_name_use'=>'nationality_master',
          'stdel'=>1
          ],



          [
          'id_table'=>9,
          'table_name_show'=>'Religion Information',
          'table_name_use'=>'religion_master',
          'stdel'=>1
          ],



          [
          'id_table'=>10,
          'table_name_show'=>'Hospital Information',
          'table_name_use'=>'hospital_master',
          'stdel'=>0
          ],



          [
          'id_table'=>11,
          'table_name_show'=>'Department Information',
          'table_name_use'=>'department_master',
          'stdel'=>0
          ],



          [
          'id_table'=>12,
          'table_name_show'=>'Patient Type Information',
          'table_name_use'=>'patient_type',
          'stdel'=>0
          ],



          [
          'id_table'=>13,
          'table_name_show'=>'Ward Information',
          'table_name_use'=>'ward',
          'stdel'=>0
          ],



          [
          'id_table'=>18,
          'table_name_show'=>'QC Name Information',
          'table_name_use'=>'qc_name_master',
          'stdel'=>0
          ],



          [
          'id_table'=>19,
          'table_name_show'=>'QC Level Information',
          'table_name_use'=>'qc_level_master',
          'stdel'=>0
          ],



          [
          'id_table'=>20,
          'table_name_show'=>'Lab Sub Group Information',
          'table_name_use'=>'lab_sub_group_item_master',
          'stdel'=>0
          ],



          [
          'id_table'=>21,
          'table_name_show'=>'Lab Item Information',
          'table_name_use'=>'lab_item_master',
          'stdel'=>0
          ],



          [
          'id_table'=>22,
          'table_name_show'=>'Lab Form Information',
          'table_name_use'=>'form_lab_master',
          'stdel'=>1
          ],



          [
          'id_table'=>23,
          'table_name_show'=>'Lab Item Type Information',
          'table_name_use'=>'lab_item_type_master',
          'stdel'=>0
          ],



          [
          'id_table'=>24,
          'table_name_show'=>'Group Barcode Information',
          'table_name_use'=>'group_barcode_master',
          'stdel'=>0
          ],



          [
          'id_table'=>25,
          'table_name_show'=>'Group Result Information',
          'table_name_use'=>'group_result_master',
          'stdel'=>0
          ],



          [
          'id_table'=>26,
          'table_name_show'=>'Lab Barcode Information',
          'table_name_use'=>'lab_barcode_master',
          'stdel'=>0
          ],



          [
          'id_table'=>28,
          'table_name_show'=>'User Group Information',
          'table_name_use'=>'group_user_master',
          'stdel'=>0
          ],



          [
          'id_table'=>29,
          'table_name_show'=>'Clinic Information',
          'table_name_use'=>'clinic_master',
          'stdel'=>0
          ],



          [
          'id_table'=>30,
          'table_name_show'=>'Service Plan Information',
          'table_name_use'=>'service_plan_master',
          'stdel'=>0
          ]
          ]);

        }


    }
}
