<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('province')->delete();
        
        \DB::table('province')->insert(array (
            0 => 
            array (
                'province_id' => 1,
                'province_code' => '10',
                'province_name' => 'กรุงเทพมหานคร   ',
                'geo_id' => 2,
            ),
            1 => 
            array (
                'province_id' => 2,
                'province_code' => '11',
                'province_name' => 'สมุทรปราการ   ',
                'geo_id' => 2,
            ),
            2 => 
            array (
                'province_id' => 3,
                'province_code' => '12',
                'province_name' => 'นนทบุรี   ',
                'geo_id' => 2,
            ),
            3 => 
            array (
                'province_id' => 4,
                'province_code' => '13',
                'province_name' => 'ปทุมธานี   ',
                'geo_id' => 2,
            ),
            4 => 
            array (
                'province_id' => 5,
                'province_code' => '14',
                'province_name' => 'พระนครศรีอยุธยา   ',
                'geo_id' => 2,
            ),
            5 => 
            array (
                'province_id' => 6,
                'province_code' => '15',
                'province_name' => 'อ่างทอง   ',
                'geo_id' => 2,
            ),
            6 => 
            array (
                'province_id' => 7,
                'province_code' => '16',
                'province_name' => 'ลพบุรี   ',
                'geo_id' => 2,
            ),
            7 => 
            array (
                'province_id' => 8,
                'province_code' => '17',
                'province_name' => 'สิงห์บุรี   ',
                'geo_id' => 2,
            ),
            8 => 
            array (
                'province_id' => 9,
                'province_code' => '18',
                'province_name' => 'ชัยนาท   ',
                'geo_id' => 2,
            ),
            9 => 
            array (
                'province_id' => 10,
                'province_code' => '19',
                'province_name' => 'สระบุรี',
                'geo_id' => 2,
            ),
            10 => 
            array (
                'province_id' => 11,
                'province_code' => '20',
                'province_name' => 'ชลบุรี   ',
                'geo_id' => 5,
            ),
            11 => 
            array (
                'province_id' => 12,
                'province_code' => '21',
                'province_name' => 'ระยอง   ',
                'geo_id' => 5,
            ),
            12 => 
            array (
                'province_id' => 13,
                'province_code' => '22',
                'province_name' => 'จันทบุรี   ',
                'geo_id' => 5,
            ),
            13 => 
            array (
                'province_id' => 14,
                'province_code' => '23',
                'province_name' => 'ตราด   ',
                'geo_id' => 5,
            ),
            14 => 
            array (
                'province_id' => 15,
                'province_code' => '24',
                'province_name' => 'ฉะเชิงเทรา   ',
                'geo_id' => 5,
            ),
            15 => 
            array (
                'province_id' => 16,
                'province_code' => '25',
                'province_name' => 'ปราจีนบุรี   ',
                'geo_id' => 5,
            ),
            16 => 
            array (
                'province_id' => 17,
                'province_code' => '26',
                'province_name' => 'นครนายก   ',
                'geo_id' => 2,
            ),
            17 => 
            array (
                'province_id' => 18,
                'province_code' => '27',
                'province_name' => 'สระแก้ว   ',
                'geo_id' => 5,
            ),
            18 => 
            array (
                'province_id' => 19,
                'province_code' => '30',
                'province_name' => 'นครราชสีมา   ',
                'geo_id' => 3,
            ),
            19 => 
            array (
                'province_id' => 20,
                'province_code' => '31',
                'province_name' => 'บุรีรัมย์   ',
                'geo_id' => 3,
            ),
            20 => 
            array (
                'province_id' => 21,
                'province_code' => '32',
                'province_name' => 'สุรินทร์   ',
                'geo_id' => 3,
            ),
            21 => 
            array (
                'province_id' => 22,
                'province_code' => '33',
                'province_name' => 'ศรีสะเกษ   ',
                'geo_id' => 3,
            ),
            22 => 
            array (
                'province_id' => 23,
                'province_code' => '34',
                'province_name' => 'อุบลราชธานี   ',
                'geo_id' => 3,
            ),
            23 => 
            array (
                'province_id' => 24,
                'province_code' => '35',
                'province_name' => 'ยโสธร   ',
                'geo_id' => 3,
            ),
            24 => 
            array (
                'province_id' => 25,
                'province_code' => '36',
                'province_name' => 'ชัยภูมิ   ',
                'geo_id' => 3,
            ),
            25 => 
            array (
                'province_id' => 26,
                'province_code' => '37',
                'province_name' => 'อำนาจเจริญ   ',
                'geo_id' => 3,
            ),
            26 => 
            array (
                'province_id' => 27,
                'province_code' => '39',
                'province_name' => 'หนองบัวลำภู   ',
                'geo_id' => 3,
            ),
            27 => 
            array (
                'province_id' => 28,
                'province_code' => '40',
                'province_name' => 'ขอนแก่น   ',
                'geo_id' => 3,
            ),
            28 => 
            array (
                'province_id' => 29,
                'province_code' => '41',
                'province_name' => 'อุดรธานี   ',
                'geo_id' => 3,
            ),
            29 => 
            array (
                'province_id' => 30,
                'province_code' => '42',
                'province_name' => 'เลย   ',
                'geo_id' => 3,
            ),
            30 => 
            array (
                'province_id' => 31,
                'province_code' => '43',
                'province_name' => 'หนองคาย   ',
                'geo_id' => 3,
            ),
            31 => 
            array (
                'province_id' => 32,
                'province_code' => '44',
                'province_name' => 'มหาสารคาม   ',
                'geo_id' => 3,
            ),
            32 => 
            array (
                'province_id' => 33,
                'province_code' => '45',
                'province_name' => 'ร้อยเอ็ด   ',
                'geo_id' => 3,
            ),
            33 => 
            array (
                'province_id' => 34,
                'province_code' => '46',
                'province_name' => 'กาฬสินธุ์   ',
                'geo_id' => 3,
            ),
            34 => 
            array (
                'province_id' => 35,
                'province_code' => '47',
                'province_name' => 'สกลนคร   ',
                'geo_id' => 3,
            ),
            35 => 
            array (
                'province_id' => 36,
                'province_code' => '48',
                'province_name' => 'นครพนม   ',
                'geo_id' => 3,
            ),
            36 => 
            array (
                'province_id' => 37,
                'province_code' => '49',
                'province_name' => 'มุกดาหาร   ',
                'geo_id' => 3,
            ),
            37 => 
            array (
                'province_id' => 38,
                'province_code' => '50',
                'province_name' => 'เชียงใหม่   ',
                'geo_id' => 1,
            ),
            38 => 
            array (
                'province_id' => 39,
                'province_code' => '51',
                'province_name' => 'ลำพูน   ',
                'geo_id' => 1,
            ),
            39 => 
            array (
                'province_id' => 40,
                'province_code' => '52',
                'province_name' => 'ลำปาง   ',
                'geo_id' => 1,
            ),
            40 => 
            array (
                'province_id' => 41,
                'province_code' => '53',
                'province_name' => 'อุตรดิตถ์   ',
                'geo_id' => 1,
            ),
            41 => 
            array (
                'province_id' => 42,
                'province_code' => '54',
                'province_name' => 'แพร่   ',
                'geo_id' => 1,
            ),
            42 => 
            array (
                'province_id' => 43,
                'province_code' => '55',
                'province_name' => 'น่าน   ',
                'geo_id' => 1,
            ),
            43 => 
            array (
                'province_id' => 44,
                'province_code' => '56',
                'province_name' => 'พะเยา   ',
                'geo_id' => 1,
            ),
            44 => 
            array (
                'province_id' => 45,
                'province_code' => '57',
                'province_name' => 'เชียงราย   ',
                'geo_id' => 1,
            ),
            45 => 
            array (
                'province_id' => 46,
                'province_code' => '58',
                'province_name' => 'แม่ฮ่องสอน   ',
                'geo_id' => 1,
            ),
            46 => 
            array (
                'province_id' => 47,
                'province_code' => '60',
                'province_name' => 'นครสวรรค์   ',
                'geo_id' => 2,
            ),
            47 => 
            array (
                'province_id' => 48,
                'province_code' => '61',
                'province_name' => 'อุทัยธานี   ',
                'geo_id' => 2,
            ),
            48 => 
            array (
                'province_id' => 49,
                'province_code' => '62',
                'province_name' => 'กำแพงเพชร   ',
                'geo_id' => 2,
            ),
            49 => 
            array (
                'province_id' => 50,
                'province_code' => '63',
                'province_name' => 'ตาก   ',
                'geo_id' => 4,
            ),
            50 => 
            array (
                'province_id' => 51,
                'province_code' => '64',
                'province_name' => 'สุโขทัย   ',
                'geo_id' => 2,
            ),
            51 => 
            array (
                'province_id' => 52,
                'province_code' => '65',
                'province_name' => 'พิษณุโลก   ',
                'geo_id' => 2,
            ),
            52 => 
            array (
                'province_id' => 53,
                'province_code' => '66',
                'province_name' => 'พิจิตร   ',
                'geo_id' => 2,
            ),
            53 => 
            array (
                'province_id' => 54,
                'province_code' => '67',
                'province_name' => 'เพชรบูรณ์   ',
                'geo_id' => 2,
            ),
            54 => 
            array (
                'province_id' => 55,
                'province_code' => '70',
                'province_name' => 'ราชบุรี   ',
                'geo_id' => 4,
            ),
            55 => 
            array (
                'province_id' => 56,
                'province_code' => '71',
                'province_name' => 'กาญจนบุรี   ',
                'geo_id' => 4,
            ),
            56 => 
            array (
                'province_id' => 57,
                'province_code' => '72',
                'province_name' => 'สุพรรณบุรี   ',
                'geo_id' => 2,
            ),
            57 => 
            array (
                'province_id' => 58,
                'province_code' => '73',
                'province_name' => 'นครปฐม   ',
                'geo_id' => 2,
            ),
            58 => 
            array (
                'province_id' => 59,
                'province_code' => '74',
                'province_name' => 'สมุทรสาคร   ',
                'geo_id' => 2,
            ),
            59 => 
            array (
                'province_id' => 60,
                'province_code' => '75',
                'province_name' => 'สมุทรสงคราม   ',
                'geo_id' => 2,
            ),
            60 => 
            array (
                'province_id' => 61,
                'province_code' => '76',
                'province_name' => 'เพชรบุรี   ',
                'geo_id' => 4,
            ),
            61 => 
            array (
                'province_id' => 62,
                'province_code' => '77',
                'province_name' => 'ประจวบคีรีขันธ์   ',
                'geo_id' => 4,
            ),
            62 => 
            array (
                'province_id' => 63,
                'province_code' => '80',
                'province_name' => 'นครศรีธรรมราช   ',
                'geo_id' => 6,
            ),
            63 => 
            array (
                'province_id' => 64,
                'province_code' => '81',
                'province_name' => 'กระบี่   ',
                'geo_id' => 6,
            ),
            64 => 
            array (
                'province_id' => 65,
                'province_code' => '82',
                'province_name' => 'พังงา   ',
                'geo_id' => 6,
            ),
            65 => 
            array (
                'province_id' => 66,
                'province_code' => '83',
                'province_name' => 'ภูเก็ต   ',
                'geo_id' => 6,
            ),
            66 => 
            array (
                'province_id' => 67,
                'province_code' => '84',
                'province_name' => 'สุราษฎร์ธานี   ',
                'geo_id' => 6,
            ),
            67 => 
            array (
                'province_id' => 68,
                'province_code' => '85',
                'province_name' => 'ระนอง   ',
                'geo_id' => 6,
            ),
            68 => 
            array (
                'province_id' => 69,
                'province_code' => '86',
                'province_name' => 'ชุมพร   ',
                'geo_id' => 6,
            ),
            69 => 
            array (
                'province_id' => 70,
                'province_code' => '90',
                'province_name' => 'สงขลา   ',
                'geo_id' => 6,
            ),
            70 => 
            array (
                'province_id' => 71,
                'province_code' => '91',
                'province_name' => 'สตูล   ',
                'geo_id' => 6,
            ),
            71 => 
            array (
                'province_id' => 72,
                'province_code' => '92',
                'province_name' => 'ตรัง   ',
                'geo_id' => 6,
            ),
            72 => 
            array (
                'province_id' => 73,
                'province_code' => '93',
                'province_name' => 'พัทลุง   ',
                'geo_id' => 6,
            ),
            73 => 
            array (
                'province_id' => 74,
                'province_code' => '94',
                'province_name' => 'ปัตตานี   ',
                'geo_id' => 6,
            ),
            74 => 
            array (
                'province_id' => 75,
                'province_code' => '95',
                'province_name' => 'ยะลา   ',
                'geo_id' => 6,
            ),
            75 => 
            array (
                'province_id' => 76,
                'province_code' => '96',
                'province_name' => 'นราธิวาส   ',
                'geo_id' => 6,
            ),
            76 => 
            array (
                'province_id' => 77,
                'province_code' => '97',
                'province_name' => 'บึงกาฬ',
                'geo_id' => 3,
            ),
        ));
        
        
    }
}