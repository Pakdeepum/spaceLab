<?php

use Illuminate\Database\Seeder;

class SpecimenItemRejectOrderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('specimen_item_reject_order')->delete();
        
        \DB::table('specimen_item_reject_order')->insert(array (
            0 => 
            array (
                'id_specimen_item_reject' => 1,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            1 => 
            array (
                'id_specimen_item_reject' => 2,
                'id_specimen_item_reject_note' => 2,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            2 => 
            array (
                'id_specimen_item_reject' => 5,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 24,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            3 => 
            array (
                'id_specimen_item_reject' => 6,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 23,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            4 => 
            array (
                'id_specimen_item_reject' => 7,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            5 => 
            array (
                'id_specimen_item_reject' => 8,
                'id_specimen_item_reject_note' => 2,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            6 => 
            array (
                'id_specimen_item_reject' => 9,
                'id_specimen_item_reject_note' => 3,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => NULL,
                'id_username' => NULL,
            ),
            7 => 
            array (
                'id_specimen_item_reject' => 10,
                'id_specimen_item_reject_note' => 2,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 08:38:49',
                'id_username' => NULL,
            ),
            8 => 
            array (
                'id_specimen_item_reject' => 11,
                'id_specimen_item_reject_note' => 3,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 08:38:49',
                'id_username' => NULL,
            ),
            9 => 
            array (
                'id_specimen_item_reject' => 12,
                'id_specimen_item_reject_note' => 4,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 08:38:49',
                'id_username' => NULL,
            ),
            10 => 
            array (
                'id_specimen_item_reject' => 13,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 09:02:10',
                'id_username' => 1,
            ),
            11 => 
            array (
                'id_specimen_item_reject' => 14,
                'id_specimen_item_reject_note' => 1,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 09:19:56',
                'id_username' => 1,
            ),
            12 => 
            array (
                'id_specimen_item_reject' => 15,
                'id_specimen_item_reject_note' => 2,
                'id_specimen_item' => 25,
                'stdel' => 0,
                'specimen_item_reject_date' => '2018-09-27 09:19:56',
                'id_username' => 1,
            ),
            13 => 
            array (
                'id_specimen_item_reject' => 16,
                'id_specimen_item_reject_note' => 3,
                'id_specimen_item' => 1,
                'stdel' => 0,
                'specimen_item_reject_date' => '2019-02-23 09:00:49',
                'id_username' => 1,
            ),
        ));
        
        
    }
}