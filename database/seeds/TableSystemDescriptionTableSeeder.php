<?php

use Illuminate\Database\Seeder;

class TableSystemDescriptionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('table_system_description')->delete();
        if(!$SeedEngVer){
          \DB::table('table_system_description')->insert(array (
              0 =>
              array (
                  'id_table_field_name' => 5,
                  'table_field_name_use' => 'position_name',
                  'table_field_name_show' => 'ชื่อตำแหน่งงาน',
                  'id_table' => 4,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              1 =>
              array (
                  'id_table_field_name' => 11,
                  'table_field_name_use' => 'specialty_name',
                  'table_field_name_show' => 'ชื่อความชำนาญการ',
                  'id_table' => 2,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              2 =>
              array (
                  'id_table_field_name' => 12,
                  'table_field_name_use' => 'id_specialty',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 2,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              3 =>
              array (
                  'id_table_field_name' => 8,
                  'table_field_name_use' => 'id_position',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 4,
                  'stdel' => 0,
                  'visible' => 1,
                  'priority' => 1,
              ),
              4 =>
              array (
                  'id_table_field_name' => 9,
                  'table_field_name_use' => 'ethnicity_name',
                  'table_field_name_show' => 'ชื่อเชื้อชาติ',
                  'id_table' => 6,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              5 =>
              array (
                  'id_table_field_name' => 10,
                  'table_field_name_use' => 'id_ethnicity',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 6,
                  'stdel' => 0,
                  'visible' => 1,
                  'priority' => 1,
              ),
              6 =>
              array (
                  'id_table_field_name' => 13,
                  'table_field_name_use' => 'id_lab_specimen_item',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 7,
                  'stdel' => 0,
                  'visible' => 1,
                  'priority' => 1,
              ),
              7 =>
              array (
                  'id_table_field_name' => 14,
                  'table_field_name_use' => 'lab_specimen_item_name',
                  'table_field_name_show' => 'ชื่อสิ่งส่งตรวจ',
                  'id_table' => 7,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              8 =>
              array (
                  'id_table_field_name' => 15,
                  'table_field_name_use' => 'lab_specimen_item_code',
                  'table_field_name_show' => 'รหัสสิ่งส่งตรวจ',
                  'id_table' => 7,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              9 =>
              array (
                  'id_table_field_name' => 16,
                  'table_field_name_use' => 'lab_specimen_item_note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 7,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              10 =>
              array (
                  'id_table_field_name' => 17,
                  'table_field_name_use' => 'id_nationality',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 8,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              11 =>
              array (
                  'id_table_field_name' => 18,
                  'table_field_name_use' => 'nationality_name',
                  'table_field_name_show' => 'ชื่อสัญชาติ',
                  'id_table' => 8,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              12 =>
              array (
                  'id_table_field_name' => 19,
                  'table_field_name_use' => 'id_religion',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 9,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              13 =>
              array (
                  'id_table_field_name' => 20,
                  'table_field_name_use' => 'religion_name',
                  'table_field_name_show' => 'ชื่อศาสนา',
                  'id_table' => 9,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              14 =>
              array (
                  'id_table_field_name' => 21,
                  'table_field_name_use' => 'id_hospital',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 10,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              15 =>
              array (
                  'id_table_field_name' => 22,
                  'table_field_name_use' => 'hn_hospital',
                  'table_field_name_show' => 'HN โรงพยาบาล',
                  'id_table' => 10,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              16 =>
              array (
                  'id_table_field_name' => 23,
                  'table_field_name_use' => 'hospital_name',
                  'table_field_name_show' => 'ชื่อโรงพยาบาล',
                  'id_table' => 10,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              17 =>
              array (
                  'id_table_field_name' => 24,
                  'table_field_name_use' => 'hospital_address',
                  'table_field_name_show' => 'ที่อยู่โรงพยาบาล',
                  'id_table' => 10,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              18 =>
              array (
                  'id_table_field_name' => 25,
                  'table_field_name_use' => 'hospital_tel',
                  'table_field_name_show' => 'เบอร์โทรศัพท์',
                  'id_table' => 10,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              19 =>
              array (
                  'id_table_field_name' => 26,
                  'table_field_name_use' => 'id_department',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 11,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              20 =>
              array (
                  'id_table_field_name' => 27,
                  'table_field_name_use' => 'department_name',
                  'table_field_name_show' => 'ชื่อแผนก',
                  'id_table' => 11,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              21 =>
              array (
                  'id_table_field_name' => 28,
                  'table_field_name_use' => 'department_note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 11,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              22 =>
              array (
                  'id_table_field_name' => 29,
                  'table_field_name_use' => 'id_patient_type',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 12,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              23 =>
              array (
                  'id_table_field_name' => 30,
                  'table_field_name_use' => 'patient_type_name',
                  'table_field_name_show' => 'ชื่อประเภทผู้ป่วย',
                  'id_table' => 12,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              24 =>
              array (
                  'id_table_field_name' => 31,
                  'table_field_name_use' => 'patient_type_note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 12,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              25 =>
              array (
                  'id_table_field_name' => 32,
                  'table_field_name_use' => 'id_qc_name',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 18,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              26 =>
              array (
                  'id_table_field_name' => 33,
                  'table_field_name_use' => 'qc_name',
                  'table_field_name_show' => 'ชื่อ QC',
                  'id_table' => 18,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              27 =>
              array (
                  'id_table_field_name' => 34,
                  'table_field_name_use' => 'id_qc_level',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 19,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              28 =>
              array (
                  'id_table_field_name' => 35,
                  'table_field_name_use' => 'qc_level',
                  'table_field_name_show' => 'Level QC',
                  'id_table' => 19,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              29 =>
              array (
                  'id_table_field_name' => 36,
                  'table_field_name_use' => 'id_lab_sub_group_item',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 20,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              30 =>
              array (
                  'id_table_field_name' => 37,
                  'table_field_name_use' => 'lab_sub_group_name',
                  'table_field_name_show' => 'ชื่อกลุ่มตรวจ',
                  'id_table' => 20,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              31 =>
              array (
                  'id_table_field_name' => 38,
                  'table_field_name_use' => 'lab_sub_group_code',
                  'table_field_name_show' => 'รหัสกลุ่มตรวจ',
                  'id_table' => 20,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              32 =>
              array (
                  'id_table_field_name' => 39,
                  'table_field_name_use' => 'note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 20,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              33 =>
              array (
                  'id_table_field_name' => 40,
                  'table_field_name_use' => 'id_lab_item',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              34 =>
              array (
                  'id_table_field_name' => 41,
                  'table_field_name_use' => 'lab_item_name',
                  'table_field_name_show' => 'ชื่อรายการตรวจ',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              35 =>
              array (
                  'id_table_field_name' => 42,
                  'table_field_name_use' => 'lab_item_code',
                  'table_field_name_show' => 'รหัสการตรวจ',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              36 =>
              array (
                  'id_table_field_name' => 43,
                  'table_field_name_use' => 'lab_item_unit',
                  'table_field_name_show' => 'หน่วยรายการ',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              37 =>
              array (
                  'id_table_field_name' => 44,
                  'table_field_name_use' => 'lab_default_value',
                  'table_field_name_show' => 'ค่าผลแลปอัตโนมัติ',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              38 =>
              array (
                  'id_table_field_name' => 45,
                  'table_field_name_use' => 'tat_default',
                  'table_field_name_show' => 'ค่า TAT',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              39 =>
              array (
                  'id_table_field_name' => 46,
                  'table_field_name_use' => 'note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 21,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              40 =>
              array (
                  'id_table_field_name' => 47,
                  'table_field_name_use' => 'id_form',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 22,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              41 =>
              array (
                  'id_table_field_name' => 48,
                  'table_field_name_use' => 'form_name',
                  'table_field_name_show' => 'ชื่อฟอร์ม',
                  'id_table' => 22,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              42 =>
              array (
                  'id_table_field_name' => 49,
                  'table_field_name_use' => 'form_code',
                  'table_field_name_show' => 'เลขรหัสฟอร์ม',
                  'id_table' => 22,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              43 =>
              array (
                  'id_table_field_name' => 50,
                  'table_field_name_use' => 'note',
                  'table_field_name_show' => 'หมายเหตุ',
                  'id_table' => 22,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              44 =>
              array (
                  'id_table_field_name' => 51,
                  'table_field_name_use' => 'id_ward',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 13,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              45 =>
              array (
                  'id_table_field_name' => 52,
                  'table_field_name_use' => 'ward_name',
                  'table_field_name_show' => 'ชื่อ ward',
                  'id_table' => 13,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              46 =>
              array (
                  'id_table_field_name' => 53,
                  'table_field_name_use' => 'ward_code',
                  'table_field_name_show' => 'รหัส ward',
                  'id_table' => 13,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              47 =>
              array (
                  'id_table_field_name' => 54,
                  'table_field_name_use' => 'id_Item_type',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 23,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              48 =>
              array (
                  'id_table_field_name' => 55,
                  'table_field_name_use' => 'item_type_name',
                  'table_field_name_show' => 'ชื่อประเภท',
                  'id_table' => 23,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              49 =>
              array (
                  'id_table_field_name' => 56,
                  'table_field_name_use' => 'id_group_barcode',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 24,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              50 =>
              array (
                  'id_table_field_name' => 57,
                  'table_field_name_use' => 'group_barcode_name',
                  'table_field_name_show' => 'Group Barcode',
                  'id_table' => 24,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              51 =>
              array (
                  'id_table_field_name' => 58,
                  'table_field_name_use' => 'id_group_result',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 25,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              52 =>
              array (
                  'id_table_field_name' => 59,
                  'table_field_name_use' => 'group_result_name',
                  'table_field_name_show' => 'Group Result',
                  'id_table' => 25,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              53 =>
              array (
                  'id_table_field_name' => 60,
                  'table_field_name_use' => 'id_lab_barcode',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 26,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              54 =>
              array (
                  'id_table_field_name' => 61,
                  'table_field_name_use' => 'lab_barcode_name',
                  'table_field_name_show' => 'Lab Barcode',
                  'id_table' => 26,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              55 =>
              array (
                  'id_table_field_name' => 62,
                  'table_field_name_use' => 'id_group_user',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 28,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              56 =>
              array (
                  'id_table_field_name' => 63,
                  'table_field_name_use' => 'group_user_name',
                  'table_field_name_show' => 'ชื่อกลุ่มผู้ใช้',
                  'id_table' => 28,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              57 =>
              array (
                  'id_table_field_name' => 64,
                  'table_field_name_use' => 'id_clinic',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 29,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              58 =>
              array (
                  'id_table_field_name' => 65,
                  'table_field_name_use' => 'clinic_code',
                  'table_field_name_show' => 'รหัสคลินิค',
                  'id_table' => 29,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              59 =>
              array (
                  'id_table_field_name' => 66,
                  'table_field_name_use' => 'clinic_name',
                  'table_field_name_show' => 'ชื่อคลินิค',
                  'id_table' => 29,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
              60 =>
              array (
                  'id_table_field_name' => 67,
                  'table_field_name_use' => 'id_service_plan',
                  'table_field_name_show' => 'เลขที่อ้างอิง',
                  'id_table' => 30,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 1,
              ),
              61 =>
              array (
                  'id_table_field_name' => 68,
                  'table_field_name_use' => 'service_plan_name',
                  'table_field_name_show' => 'สิทธิการรักษา',
                  'id_table' => 30,
                  'stdel' => 0,
                  'visible' => 0,
                  'priority' => 0,
              ),
          ));
        }
        else{
          \DB::table('table_system_description')->insert([
            [
          'id_table_field_name'=>5,
          'table_field_name_use'=>'position_name',
          'table_field_name_show'=>'Job Position',
          'id_table'=>4,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>8,
          'table_field_name_use'=>'id_position',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>4,
          'stdel'=>0,
          'visible'=>1,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>9,
          'table_field_name_use'=>'ethnicity_name',
          'table_field_name_show'=>'Ethnic',
          'id_table'=>6,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>10,
          'table_field_name_use'=>'id_ethnicity',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>6,
          'stdel'=>0,
          'visible'=>1,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>11,
          'table_field_name_use'=>'specialty_name',
          'table_field_name_show'=>'Speciality',
          'id_table'=>2,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>12,
          'table_field_name_use'=>'id_specialty',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>2,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>13,
          'table_field_name_use'=>'id_lab_specimen_item',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>7,
          'stdel'=>0,
          'visible'=>1,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>14,
          'table_field_name_use'=>'lab_specimen_item_name',
          'table_field_name_show'=>'Lab Specimen Name',
          'id_table'=>7,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>15,
          'table_field_name_use'=>'lab_specimen_item_code',
          'table_field_name_show'=>'Lab Specimen Code',
          'id_table'=>7,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>16,
          'table_field_name_use'=>'lab_specimen_item_note',
          'table_field_name_show'=>'Lab Specimen Note',
          'id_table'=>7,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>17,
          'table_field_name_use'=>'id_nationality',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>8,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>18,
          'table_field_name_use'=>'nationality_name',
          'table_field_name_show'=>'Nationality',
          'id_table'=>8,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>19,
          'table_field_name_use'=>'id_religion',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>9,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>20,
          'table_field_name_use'=>'religion_name',
          'table_field_name_show'=>'Religion',
          'id_table'=>9,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>21,
          'table_field_name_use'=>'id_hospital',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>10,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>22,
          'table_field_name_use'=>'hn_hospital',
          'table_field_name_show'=>'Hospital HN ',
          'id_table'=>10,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>23,
          'table_field_name_use'=>'hospital_name',
          'table_field_name_show'=>'Hospital Name',
          'id_table'=>10,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>24,
          'table_field_name_use'=>'hospital_address',
          'table_field_name_show'=>'Hospital Address',
          'id_table'=>10,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>25,
          'table_field_name_use'=>'hospital_tel',
          'table_field_name_show'=>'Hospital Telephone Number',
          'id_table'=>10,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>26,
          'table_field_name_use'=>'id_department',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>11,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>27,
          'table_field_name_use'=>'department_name',
          'table_field_name_show'=>'Department',
          'id_table'=>11,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>28,
          'table_field_name_use'=>'department_note',
          'table_field_name_show'=>'Note',
          'id_table'=>11,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>29,
          'table_field_name_use'=>'id_patient_type',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>12,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>30,
          'table_field_name_use'=>'patient_type_name',
          'table_field_name_show'=>'Patient Type',
          'id_table'=>12,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>31,
          'table_field_name_use'=>'patient_type_note',
          'table_field_name_show'=>'Note',
          'id_table'=>12,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>32,
          'table_field_name_use'=>'id_qc_name',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>18,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>33,
          'table_field_name_use'=>'qc_name',
          'table_field_name_show'=>'QC Name',
          'id_table'=>18,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>34,
          'table_field_name_use'=>'id_qc_level',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>19,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>35,
          'table_field_name_use'=>'qc_level',
          'table_field_name_show'=>'QC Level',
          'id_table'=>19,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>36,
          'table_field_name_use'=>'id_lab_sub_group_item',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>20,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>37,
          'table_field_name_use'=>'lab_sub_group_name',
          'table_field_name_show'=>'Lab Sub Group Name',
          'id_table'=>20,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>38,
          'table_field_name_use'=>'lab_sub_group_code',
          'table_field_name_show'=>'Lab Sub Group Code',
          'id_table'=>20,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>39,
          'table_field_name_use'=>'note',
          'table_field_name_show'=>'Note',
          'id_table'=>20,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>40,
          'table_field_name_use'=>'id_lab_item',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>41,
          'table_field_name_use'=>'lab_item_name',
          'table_field_name_show'=>'Lab Item Name',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>42,
          'table_field_name_use'=>'lab_item_code',
          'table_field_name_show'=>'Lab Item Code',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>43,
          'table_field_name_use'=>'lab_item_unit',
          'table_field_name_show'=>'Lab Item Unit',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>44,
          'table_field_name_use'=>'lab_default_value',
          'table_field_name_show'=>'Lab Result Default Value',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>45,
          'table_field_name_use'=>'tat_default',
          'table_field_name_show'=>'TAT',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>46,
          'table_field_name_use'=>'note',
          'table_field_name_show'=>'Note',
          'id_table'=>21,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>47,
          'table_field_name_use'=>'id_form',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>22,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>48,
          'table_field_name_use'=>'form_name',
          'table_field_name_show'=>'Form Name',
          'id_table'=>22,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>49,
          'table_field_name_use'=>'form_code',
          'table_field_name_show'=>'Form Code',
          'id_table'=>22,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>50,
          'table_field_name_use'=>'note',
          'table_field_name_show'=>'Note',
          'id_table'=>22,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>51,
          'table_field_name_use'=>'id_ward',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>13,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>52,
          'table_field_name_use'=>'ward_name',
          'table_field_name_show'=>'Ward Name',
          'id_table'=>13,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>53,
          'table_field_name_use'=>'ward_code',
          'table_field_name_show'=>'Ward Code',
          'id_table'=>13,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>54,
          'table_field_name_use'=>'id_Item_type',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>23,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>55,
          'table_field_name_use'=>'item_type_name',
          'table_field_name_show'=>'Item Type',
          'id_table'=>23,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>56,
          'table_field_name_use'=>'id_group_barcode',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>24,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>57,
          'table_field_name_use'=>'group_barcode_name',
          'table_field_name_show'=>'Group Barcode',
          'id_table'=>24,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>58,
          'table_field_name_use'=>'id_group_result',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>25,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>59,
          'table_field_name_use'=>'group_result_name',
          'table_field_name_show'=>'Group Result',
          'id_table'=>25,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>60,
          'table_field_name_use'=>'id_lab_barcode',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>26,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>61,
          'table_field_name_use'=>'lab_barcode_name',
          'table_field_name_show'=>'Lab Barcode',
          'id_table'=>26,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>62,
          'table_field_name_use'=>'id_group_user',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>28,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>63,
          'table_field_name_use'=>'group_user_name',
          'table_field_name_show'=>'User Group',
          'id_table'=>28,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>64,
          'table_field_name_use'=>'id_clinic',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>29,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>65,
          'table_field_name_use'=>'clinic_code',
          'table_field_name_show'=>'Clinic Code',
          'id_table'=>29,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>66,
          'table_field_name_use'=>'clinic_name',
          'table_field_name_show'=>'Clinic Name',
          'id_table'=>29,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ],

          [
          'id_table_field_name'=>67,
          'table_field_name_use'=>'id_service_plan',
          'table_field_name_show'=>'Reference Number',
          'id_table'=>30,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>1
          ],

          [
          'id_table_field_name'=>68,
          'table_field_name_use'=>'service_plan_name',
          'table_field_name_show'=>'Service Plan',
          'id_table'=>30,
          'stdel'=>0,
          'visible'=>0,
          'priority'=>0
          ]
          ]);

        }

    }
}
