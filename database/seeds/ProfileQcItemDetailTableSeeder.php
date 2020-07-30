<?php

use Illuminate\Database\Seeder;

class ProfileQcItemDetailTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('profile_qc_item_detail')->delete();

        \DB::table('profile_qc_item_detail')->insert([
          [
        'id_qc_profile_detail'=>17,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>43,
        'mean'=>3.95,
        'sd'=>0.225
        ],



        [
        'id_qc_profile_detail'=>18,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>54,
        'mean'=>103,
        'sd'=>13.825
        ],



        [
        'id_qc_profile_detail'=>19,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>53,
        'mean'=>30.7,
        'sd'=>3.475
        ],



        [
        'id_qc_profile_detail'=>20,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>52,
        'mean'=>37.6,
        'sd'=>3.8
        ],



        [
        'id_qc_profile_detail'=>21,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>44,
        'mean'=>15.4,
        'sd'=>1.1
        ],



        [
        'id_qc_profile_detail'=>22,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>45,
        'mean'=>245,
        'sd'=>12.25
        ],



        [
        'id_qc_profile_detail'=>23,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>46,
        'mean'=>1.8,
        'sd'=>0.2375
        ],



        [
        'id_qc_profile_detail'=>24,
        'id_profile_qc_main'=>1,
        'id_item_qc'=>47,
        'mean'=>4.51,
        'sd'=>0.3
        ],



        [
        'id_qc_profile_detail'=>25,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>43,
        'mean'=>2.82,
        'sd'=>0.1775
        ],



        [
        'id_qc_profile_detail'=>26,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>54,
        'mean'=>419,
        'sd'=>36.5
        ],



        [
        'id_qc_profile_detail'=>27,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>53,
        'mean'=>96.7,
        'sd'=>6.7
        ],



        [
        'id_qc_profile_detail'=>28,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>52,
        'mean'=>196,
        'sd'=>12.75
        ],



        [
        'id_qc_profile_detail'=>29,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>44,
        'mean'=>46.9,
        'sd'=>2.35
        ],



        [
        'id_qc_profile_detail'=>30,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>45,
        'mean'=>95,
        'sd'=>6.125
        ],



        [
        'id_qc_profile_detail'=>31,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>46,
        'mean'=>5.35,
        'sd'=>0.31
        ],



        [
        'id_qc_profile_detail'=>32,
        'id_profile_qc_main'=>2,
        'id_item_qc'=>47,
        'mean'=>9.23,
        'sd'=>0.485
        ],



        [
        'id_qc_profile_detail'=>41,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>43,
        'mean'=>2,
        'sd'=>0.2
        ],



        [
        'id_qc_profile_detail'=>42,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>54,
        'mean'=>56,
        'sd'=>4
        ],



        [
        'id_qc_profile_detail'=>43,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>53,
        'mean'=>20,
        'sd'=>2
        ],



        [
        'id_qc_profile_detail'=>44,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>52,
        'mean'=>22,
        'sd'=>2
        ],



        [
        'id_qc_profile_detail'=>45,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>45,
        'mean'=>70,
        'sd'=>5
        ],



        [
        'id_qc_profile_detail'=>46,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>46,
        'mean'=>1.2,
        'sd'=>0.1
        ],



        [
        'id_qc_profile_detail'=>47,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>44,
        'mean'=>8,
        'sd'=>1
        ],



        [
        'id_qc_profile_detail'=>48,
        'id_profile_qc_main'=>3,
        'id_item_qc'=>47,
        'mean'=>2,
        'sd'=>0.2
        ]
        ]);


    }
}
