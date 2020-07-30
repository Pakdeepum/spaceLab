<?php

use Illuminate\Database\Seeder;

class SpecimenItemRejectNoteMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $SeedEngVer = true;
        \DB::table('specimen_item_reject_note_master')->delete();
        if(!$SeedEngVer){
          \DB::table('specimen_item_reject_note_master')->insert(array (
              0 =>
              array (
                  'id_specimen_item_reject_note' => 1,
                  'specimen_item_reject_note' => 'น้อยเกินไป',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_specimen_item_reject_note' => 2,
                  'specimen_item_reject_note' => 'มีสีดำ',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_specimen_item_reject_note' => 3,
                  'specimen_item_reject_note' => 'ปริมาณไม่พอ',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_specimen_item_reject_note' => 4,
                  'specimen_item_reject_note' => 'มีสิ่งเจือปน',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_specimen_item_reject_note' => 5,
                  'specimen_item_reject_note' => 'hemolyze',
                  'stdel' => 0,
              ),
          ));
        }else{
          \DB::table('specimen_item_reject_note_master')->insert(array (
              0 =>
              array (
                  'id_specimen_item_reject_note' => 1,
                  'specimen_item_reject_note' => 'too little',
                  'stdel' => 0,
              ),
              1 =>
              array (
                  'id_specimen_item_reject_note' => 2,
                  'specimen_item_reject_note' => 'have black',
                  'stdel' => 0,
              ),
              2 =>
              array (
                  'id_specimen_item_reject_note' => 3,
                  'specimen_item_reject_note' => 'not enough volume',
                  'stdel' => 0,
              ),
              3 =>
              array (
                  'id_specimen_item_reject_note' => 4,
                  'specimen_item_reject_note' => 'impurity',
                  'stdel' => 0,
              ),
              4 =>
              array (
                  'id_specimen_item_reject_note' => 5,
                  'specimen_item_reject_note' => 'hemolyze',
                  'stdel' => 0,
              ),
          ));
        }



    }
}
