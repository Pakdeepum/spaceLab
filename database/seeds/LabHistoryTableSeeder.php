<?php

use Illuminate\Database\Seeder;

class LabHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('lab_result_history')->delete();
        \DB::table('lab_result_history')->insert([
          [
'id'=>1,
'lab_detail_id'=>1,
'patient_id'=>'2',
'lab_approve'=>'2.2',
'user_approve'=>4,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-23 06:24:21',
'updated_at'=>'2019-04-23 14:06:00',
'analyzer_id'=>1
],



[
'id'=>2,
'lab_detail_id'=>2,
'patient_id'=>'2',
'lab_approve'=>'34',
'user_approve'=>4,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-23 06:24:21',
'updated_at'=>'2019-04-23 14:06:00',
'analyzer_id'=>1
],



[
'id'=>3,
'lab_detail_id'=>3,
'patient_id'=>'2',
'lab_approve'=>'40',
'user_approve'=>4,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-23 06:24:21',
'updated_at'=>'2019-04-23 14:06:01',
'analyzer_id'=>1
],



[
'id'=>4,
'lab_detail_id'=>4,
'patient_id'=>'5',
'lab_approve'=>'4.2',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-23 06:37:33',
'updated_at'=>'2019-04-23 06:37:33',
'analyzer_id'=>1
],



[
'id'=>5,
'lab_detail_id'=>5,
'patient_id'=>'6',
'lab_approve'=>'4',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-23 14:14:03',
'updated_at'=>'2019-04-23 14:14:03',
'analyzer_id'=>1
],



[
'id'=>6,
'lab_detail_id'=>6,
'patient_id'=>'6',
'lab_approve'=>'20',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-23 14:14:03',
'updated_at'=>'2019-04-23 14:14:03',
'analyzer_id'=>1
],



[
'id'=>7,
'lab_detail_id'=>7,
'patient_id'=>'6',
'lab_approve'=>'40',
'user_approve'=>1,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-23 14:14:04',
'updated_at'=>'2019-04-23 14:14:04',
'analyzer_id'=>1
],



[
'id'=>8,
'lab_detail_id'=>8,
'patient_id'=>'1',
'lab_approve'=>'3.2',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-23 14:18:20',
'updated_at'=>'2019-04-23 14:18:20',
'analyzer_id'=>1
],



[
'id'=>9,
'lab_detail_id'=>9,
'patient_id'=>'2',
'lab_approve'=>'4',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-24 05:26:44',
'updated_at'=>'2019-04-24 05:26:44',
'analyzer_id'=>1
],



[
'id'=>10,
'lab_detail_id'=>10,
'patient_id'=>'2',
'lab_approve'=>'33',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-24 05:26:44',
'updated_at'=>'2019-04-24 05:26:44',
'analyzer_id'=>1
],



[
'id'=>11,
'lab_detail_id'=>11,
'patient_id'=>'4',
'lab_approve'=>'3',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:01',
'updated_at'=>'2019-04-24 05:27:01',
'analyzer_id'=>1
],



[
'id'=>12,
'lab_detail_id'=>12,
'patient_id'=>'4',
'lab_approve'=>'35',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:02',
'updated_at'=>'2019-04-24 05:27:02',
'analyzer_id'=>1
],



[
'id'=>13,
'lab_detail_id'=>13,
'patient_id'=>'3',
'lab_approve'=>'4',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:15',
'updated_at'=>'2019-04-24 05:27:15',
'analyzer_id'=>1
],



[
'id'=>14,
'lab_detail_id'=>14,
'patient_id'=>'3',
'lab_approve'=>'38',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:15',
'updated_at'=>'2019-04-24 05:27:15',
'analyzer_id'=>1
],



[
'id'=>15,
'lab_detail_id'=>15,
'patient_id'=>'7',
'lab_approve'=>'4',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:28',
'updated_at'=>'2019-04-24 05:27:28',
'analyzer_id'=>1
],



[
'id'=>16,
'lab_detail_id'=>16,
'patient_id'=>'7',
'lab_approve'=>'38',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:28',
'updated_at'=>'2019-04-24 05:27:28',
'analyzer_id'=>1
],



[
'id'=>17,
'lab_detail_id'=>17,
'patient_id'=>'7',
'lab_approve'=>'38',
'user_approve'=>1,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:29',
'updated_at'=>'2019-04-24 05:27:29',
'analyzer_id'=>1
],



[
'id'=>18,
'lab_detail_id'=>18,
'patient_id'=>'6',
'lab_approve'=>'3.0',
'user_approve'=>2,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:38',
'updated_at'=>'2019-04-24 05:48:06',
'analyzer_id'=>1
],



[
'id'=>19,
'lab_detail_id'=>19,
'patient_id'=>'6',
'lab_approve'=>'36',
'user_approve'=>2,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-24 05:27:38',
'updated_at'=>'2019-04-24 05:48:06',
'analyzer_id'=>1
],



[
'id'=>20,
'lab_detail_id'=>24,
'patient_id'=>'38',
'lab_approve'=>'-2.06577539',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-29 04:34:36',
'updated_at'=>'2019-04-29 04:34:36',
'analyzer_id'=>1
],



[
'id'=>21,
'lab_detail_id'=>23,
'patient_id'=>'37',
'lab_approve'=>'-2.09753966',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-29 04:34:53',
'updated_at'=>'2019-04-29 04:34:53',
'analyzer_id'=>1
],



[
'id'=>22,
'lab_detail_id'=>20,
'patient_id'=>'36',
'lab_approve'=>'50',
'user_approve'=>4,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-29 04:44:13',
'updated_at'=>'2019-05-06 10:38:23',
'analyzer_id'=>1
],



[
'id'=>23,
'lab_detail_id'=>21,
'patient_id'=>'36',
'lab_approve'=>'1',
'user_approve'=>4,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-29 04:44:13',
'updated_at'=>'2019-05-06 10:38:23',
'analyzer_id'=>1
],



[
'id'=>24,
'lab_detail_id'=>22,
'patient_id'=>'36',
'lab_approve'=>'-6',
'user_approve'=>4,
'item_id'=>'54',
'repeat'=>0,
'created_at'=>'2019-04-29 04:44:13',
'updated_at'=>'2019-05-06 10:38:23',
'analyzer_id'=>1
],



[
'id'=>25,
'lab_detail_id'=>23,
'patient_id'=>'37',
'lab_approve'=>'-2.1',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>1,
'created_at'=>'2019-04-29 04:45:43',
'updated_at'=>'2019-04-29 04:45:43',
'analyzer_id'=>1
],



[
'id'=>26,
'lab_detail_id'=>30,
'patient_id'=>'42',
'lab_approve'=>'-2.07751918',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-29 06:01:28',
'updated_at'=>'2019-04-29 06:01:28',
'analyzer_id'=>1
],



[
'id'=>27,
'lab_detail_id'=>25,
'patient_id'=>'39',
'lab_approve'=>'30',
'user_approve'=>4,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-29 06:09:14',
'updated_at'=>'2019-04-30 09:22:34',
'analyzer_id'=>1
],



[
'id'=>28,
'lab_detail_id'=>26,
'patient_id'=>'39',
'lab_approve'=>'30',
'user_approve'=>4,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-29 06:09:14',
'updated_at'=>'2019-04-30 09:22:34',
'analyzer_id'=>1
],



[
'id'=>29,
'lab_detail_id'=>33,
'patient_id'=>'44',
'lab_approve'=>'2.7',
'user_approve'=>4,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-04-29 09:31:07',
'updated_at'=>'2019-04-30 06:10:55',
'analyzer_id'=>1
],



[
'id'=>30,
'lab_detail_id'=>34,
'patient_id'=>'44',
'lab_approve'=>'-0',
'user_approve'=>4,
'item_id'=>'44',
'repeat'=>0,
'created_at'=>'2019-04-29 09:31:07',
'updated_at'=>'2019-04-30 06:10:55',
'analyzer_id'=>1
],



[
'id'=>31,
'lab_detail_id'=>35,
'patient_id'=>'44',
'lab_approve'=>'1',
'user_approve'=>4,
'item_id'=>'47',
'repeat'=>0,
'created_at'=>'2019-04-29 09:31:07',
'updated_at'=>'2019-04-30 06:10:55',
'analyzer_id'=>1
],



[
'id'=>32,
'lab_detail_id'=>31,
'patient_id'=>'43',
'lab_approve'=>'1',
'user_approve'=>4,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-29 09:35:25',
'updated_at'=>'2019-04-30 03:38:10',
'analyzer_id'=>1
],



[
'id'=>33,
'lab_detail_id'=>32,
'patient_id'=>'43',
'lab_approve'=>'1',
'user_approve'=>4,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-29 09:35:25',
'updated_at'=>'2019-04-30 03:38:10',
'analyzer_id'=>1
],



[
'id'=>34,
'lab_detail_id'=>36,
'patient_id'=>'45',
'lab_approve'=>'-5.32239103',
'user_approve'=>1,
'item_id'=>'54',
'repeat'=>0,
'created_at'=>'2019-04-29 09:35:54',
'updated_at'=>'2019-04-29 09:35:54',
'analyzer_id'=>1
],



[
'id'=>35,
'lab_detail_id'=>37,
'patient_id'=>'45',
'lab_approve'=>'0.188415721',
'user_approve'=>1,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-29 09:35:54',
'updated_at'=>'2019-04-29 09:35:54',
'analyzer_id'=>1
],



[
'id'=>36,
'lab_detail_id'=>38,
'patient_id'=>'45',
'lab_approve'=>'0.466264099',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-29 09:35:54',
'updated_at'=>'2019-04-29 09:35:54',
'analyzer_id'=>1
],



[
'id'=>37,
'lab_detail_id'=>51,
'patient_id'=>'60',
'lab_approve'=>'125',
'user_approve'=>1,
'item_id'=>'54',
'repeat'=>0,
'created_at'=>'2019-04-30 11:52:59',
'updated_at'=>'2019-04-30 11:52:59',
'analyzer_id'=>1
],



[
'id'=>38,
'lab_detail_id'=>52,
'patient_id'=>'60',
'lab_approve'=>'70',
'user_approve'=>1,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-04-30 11:52:59',
'updated_at'=>'2019-04-30 11:52:59',
'analyzer_id'=>1
],



[
'id'=>39,
'lab_detail_id'=>53,
'patient_id'=>'60',
'lab_approve'=>'75',
'user_approve'=>1,
'item_id'=>'52',
'repeat'=>0,
'created_at'=>'2019-04-30 11:52:59',
'updated_at'=>'2019-04-30 11:52:59',
'analyzer_id'=>1
],



[
'id'=>40,
'lab_detail_id'=>82,
'patient_id'=>'29',
'lab_approve'=>'3',
'user_approve'=>4,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-06 03:07:42',
'updated_at'=>'2019-05-06 10:40:05',
'analyzer_id'=>3
],



[
'id'=>41,
'lab_detail_id'=>79,
'patient_id'=>'27',
'lab_approve'=>'-2.03756762',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-06 03:07:59',
'updated_at'=>'2019-05-06 03:07:59',
'analyzer_id'=>3
],



[
'id'=>42,
'lab_detail_id'=>81,
'patient_id'=>'27',
'lab_approve'=>'3',
'user_approve'=>4,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 03:14:57',
'updated_at'=>'2019-05-07 03:36:51',
'analyzer_id'=>3
],



[
'id'=>43,
'lab_detail_id'=>99,
'patient_id'=>'62',
'lab_approve'=>'1.01545918',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 07:28:25',
'updated_at'=>'2019-05-06 07:28:25',
'analyzer_id'=>3
],



[
'id'=>44,
'lab_detail_id'=>96,
'patient_id'=>'61',
'lab_approve'=>'0.243530199',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 07:30:28',
'updated_at'=>'2019-05-06 07:30:28',
'analyzer_id'=>3
],



[
'id'=>45,
'lab_detail_id'=>95,
'patient_id'=>'60',
'lab_approve'=>'-0.0808120593',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 07:30:47',
'updated_at'=>'2019-05-06 07:30:47',
'analyzer_id'=>3
],



[
'id'=>46,
'lab_detail_id'=>90,
'patient_id'=>'58',
'lab_approve'=>'0.175198123',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 07:32:53',
'updated_at'=>'2019-05-06 07:32:53',
'analyzer_id'=>3
],



[
'id'=>47,
'lab_detail_id'=>92,
'patient_id'=>'60',
'lab_approve'=>'0.616602898',
'user_approve'=>1,
'item_id'=>'44',
'repeat'=>0,
'created_at'=>'2019-05-06 07:32:55',
'updated_at'=>'2019-05-06 07:32:55',
'analyzer_id'=>3
],



[
'id'=>48,
'lab_detail_id'=>93,
'patient_id'=>'60',
'lab_approve'=>'0.629417181',
'user_approve'=>1,
'item_id'=>'47',
'repeat'=>0,
'created_at'=>'2019-05-06 07:32:55',
'updated_at'=>'2019-05-06 07:32:55',
'analyzer_id'=>3
],



[
'id'=>49,
'lab_detail_id'=>87,
'patient_id'=>'53',
'lab_approve'=>'10',
'user_approve'=>4,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 07:33:45',
'updated_at'=>'2019-05-07 03:35:07',
'analyzer_id'=>3
],



[
'id'=>50,
'lab_detail_id'=>88,
'patient_id'=>'58',
'lab_approve'=>'-1',
'user_approve'=>4,
'item_id'=>'44',
'repeat'=>0,
'created_at'=>'2019-05-06 07:34:24',
'updated_at'=>'2019-05-06 10:44:00',
'analyzer_id'=>3
],



[
'id'=>51,
'lab_detail_id'=>84,
'patient_id'=>'52',
'lab_approve'=>'1',
'user_approve'=>4,
'item_id'=>'53',
'repeat'=>0,
'created_at'=>'2019-05-06 07:34:25',
'updated_at'=>'2019-05-06 10:39:19',
'analyzer_id'=>3
],



[
'id'=>52,
'lab_detail_id'=>85,
'patient_id'=>'52',
'lab_approve'=>'50',
'user_approve'=>4,
'item_id'=>'54',
'repeat'=>0,
'created_at'=>'2019-05-06 07:34:25',
'updated_at'=>'2019-05-06 10:39:19',
'analyzer_id'=>3
],



[
'id'=>53,
'lab_detail_id'=>98,
'patient_id'=>'62',
'lab_approve'=>'2.15069127',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 07:35:24',
'updated_at'=>'2019-05-06 07:35:24',
'analyzer_id'=>3
],



[
'id'=>54,
'lab_detail_id'=>86,
'patient_id'=>'53',
'lab_approve'=>'50',
'user_approve'=>4,
'item_id'=>'44',
'repeat'=>0,
'created_at'=>'2019-05-06 07:35:54',
'updated_at'=>'2019-05-07 03:34:34',
'analyzer_id'=>3
],



[
'id'=>55,
'lab_detail_id'=>91,
'patient_id'=>'59',
'lab_approve'=>'2.15648866',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 07:37:05',
'updated_at'=>'2019-05-06 07:37:05',
'analyzer_id'=>3
],



[
'id'=>56,
'lab_detail_id'=>89,
'patient_id'=>'58',
'lab_approve'=>'2',
'user_approve'=>4,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 07:37:24',
'updated_at'=>'2019-05-06 10:42:19',
'analyzer_id'=>3
],



[
'id'=>57,
'lab_detail_id'=>94,
'patient_id'=>'60',
'lab_approve'=>'2.16323161',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 07:38:34',
'updated_at'=>'2019-05-06 07:38:34',
'analyzer_id'=>3
],



[
'id'=>58,
'lab_detail_id'=>101,
'patient_id'=>'37',
'lab_approve'=>'-2.06155992',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:49',
'updated_at'=>'2019-05-06 08:00:49',
'analyzer_id'=>3
],



[
'id'=>59,
'lab_detail_id'=>100,
'patient_id'=>'36',
'lab_approve'=>'-2.04691625',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:50',
'updated_at'=>'2019-05-06 08:00:50',
'analyzer_id'=>3
],



[
'id'=>60,
'lab_detail_id'=>104,
'patient_id'=>'38',
'lab_approve'=>'0.516983271',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:51',
'updated_at'=>'2019-05-06 08:00:51',
'analyzer_id'=>3
],



[
'id'=>61,
'lab_detail_id'=>103,
'patient_id'=>'37',
'lab_approve'=>'3.55868387',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:52',
'updated_at'=>'2019-05-06 08:00:52',
'analyzer_id'=>3
],



[
'id'=>62,
'lab_detail_id'=>97,
'patient_id'=>'62',
'lab_approve'=>'1.18754113',
'user_approve'=>1,
'item_id'=>'42',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:53',
'updated_at'=>'2019-05-06 08:00:53',
'analyzer_id'=>3
],



[
'id'=>63,
'lab_detail_id'=>105,
'patient_id'=>'39',
'lab_approve'=>'2.15230703',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 08:00:59',
'updated_at'=>'2019-05-06 08:00:59',
'analyzer_id'=>3
],



[
'id'=>64,
'lab_detail_id'=>102,
'patient_id'=>'37',
'lab_approve'=>'2.16726089',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-06 08:01:19',
'updated_at'=>'2019-05-06 08:01:19',
'analyzer_id'=>3
],



[
'id'=>65,
'lab_detail_id'=>110,
'patient_id'=>'70',
'lab_approve'=>'-2.05042982',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-06 10:14:40',
'updated_at'=>'2019-05-06 10:14:40',
'analyzer_id'=>3
],



[
'id'=>66,
'lab_detail_id'=>113,
'patient_id'=>'37',
'lab_approve'=>'2.13845778',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-07 06:24:26',
'updated_at'=>'2019-05-07 06:24:26',
'analyzer_id'=>2
],



[
'id'=>67,
'lab_detail_id'=>111,
'patient_id'=>'36',
'lab_approve'=>'-2.02825475',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-07 09:33:56',
'updated_at'=>'2019-05-07 09:33:56',
'analyzer_id'=>3
],



[
'id'=>68,
'lab_detail_id'=>122,
'patient_id'=>'4',
'lab_approve'=>'0.13738738',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-08 07:29:18',
'updated_at'=>'2019-05-08 07:29:18',
'analyzer_id'=>2
],



[
'id'=>69,
'lab_detail_id'=>124,
'patient_id'=>'4',
'lab_approve'=>'-0.108986907',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-08 07:32:53',
'updated_at'=>'2019-05-08 07:32:53',
'analyzer_id'=>2
],



[
'id'=>70,
'lab_detail_id'=>123,
'patient_id'=>'4',
'lab_approve'=>'2.1330235',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-08 07:38:18',
'updated_at'=>'2019-05-08 07:38:18',
'analyzer_id'=>2
],



[
'id'=>71,
'lab_detail_id'=>125,
'patient_id'=>'19',
'lab_approve'=>'-0.0227269121',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-08 08:04:59',
'updated_at'=>'2019-05-08 08:04:59',
'analyzer_id'=>2
],



[
'id'=>72,
'lab_detail_id'=>127,
'patient_id'=>'19',
'lab_approve'=>'0.0358270705',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-08 08:08:43',
'updated_at'=>'2019-05-08 08:08:43',
'analyzer_id'=>2
],



[
'id'=>73,
'lab_detail_id'=>126,
'patient_id'=>'19',
'lab_approve'=>'2.11957645',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-08 08:14:07',
'updated_at'=>'2019-05-08 08:14:07',
'analyzer_id'=>2
],



[
'id'=>74,
'lab_detail_id'=>128,
'patient_id'=>'45',
'lab_approve'=>'0.0213280339',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:12',
'updated_at'=>'2019-05-08 08:35:12',
'analyzer_id'=>2
],



[
'id'=>75,
'lab_detail_id'=>131,
'patient_id'=>'46',
'lab_approve'=>'0.0571957193',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:14',
'updated_at'=>'2019-05-08 08:35:14',
'analyzer_id'=>2
],



[
'id'=>76,
'lab_detail_id'=>136,
'patient_id'=>'47',
'lab_approve'=>'0.754593849',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:16',
'updated_at'=>'2019-05-08 08:35:16',
'analyzer_id'=>2
],



[
'id'=>77,
'lab_detail_id'=>133,
'patient_id'=>'46',
'lab_approve'=>'-0.227495193',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:17',
'updated_at'=>'2019-05-08 08:35:17',
'analyzer_id'=>2
],



[
'id'=>78,
'lab_detail_id'=>129,
'patient_id'=>'45',
'lab_approve'=>'2.13961244',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:18',
'updated_at'=>'2019-05-08 08:35:18',
'analyzer_id'=>2
],



[
'id'=>79,
'lab_detail_id'=>135,
'patient_id'=>'47',
'lab_approve'=>'2.13580441',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:19',
'updated_at'=>'2019-05-08 08:35:19',
'analyzer_id'=>2
],



[
'id'=>80,
'lab_detail_id'=>132,
'patient_id'=>'46',
'lab_approve'=>'2.13855553',
'user_approve'=>1,
'item_id'=>'59',
'repeat'=>0,
'created_at'=>'2019-05-08 08:35:20',
'updated_at'=>'2019-05-08 08:35:20',
'analyzer_id'=>2
],



[
'id'=>81,
'lab_detail_id'=>134,
'patient_id'=>'47',
'lab_approve'=>'-0.00206066016',
'user_approve'=>1,
'item_id'=>'43',
'repeat'=>0,
'created_at'=>'2019-05-08 09:11:27',
'updated_at'=>'2019-05-08 09:11:27',
'analyzer_id'=>2
],



[
'id'=>82,
'lab_detail_id'=>130,
'patient_id'=>'45',
'lab_approve'=>'-0.13128987',
'user_approve'=>1,
'item_id'=>'61',
'repeat'=>0,
'created_at'=>'2019-05-08 09:11:29',
'updated_at'=>'2019-05-08 09:11:29',
'analyzer_id'=>2
]
        ]);
        /*
        \DB::table('lab_result_history')->insert([
          [
          'id'=>1,
          'lab_detail_id'=>24,
          'patient_id'=>'7',
          'lab_approve'=>'0.937026978',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:27:57',
          'updated_at'=>'2019-04-03 06:27:57'
          ],



          [
          'id'=>2,
          'lab_detail_id'=>8,
          'patient_id'=>'3',
          'lab_approve'=>'1.66403079',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:28:51',
          'updated_at'=>'2019-04-03 06:28:51'
          ],



          [
          'id'=>3,
          'lab_detail_id'=>10,
          'patient_id'=>'3',
          'lab_approve'=>'68.4415741',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:28:51',
          'updated_at'=>'2019-04-03 06:28:51'
          ],



          [
          'id'=>4,
          'lab_detail_id'=>9,
          'patient_id'=>'3',
          'lab_approve'=>'1.06819212',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:28:51',
          'updated_at'=>'2019-04-03 06:28:51'
          ],



          [
          'id'=>5,
          'lab_detail_id'=>1,
          'patient_id'=>'1',
          'lab_approve'=>'0.199324608',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:30:58',
          'updated_at'=>'2019-04-03 06:30:58'
          ],



          [
          'id'=>6,
          'lab_detail_id'=>2,
          'patient_id'=>'1',
          'lab_approve'=>'-0.134710222',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:30:58',
          'updated_at'=>'2019-04-03 06:30:58'
          ],



          [
          'id'=>7,
          'lab_detail_id'=>3,
          'patient_id'=>'1',
          'lab_approve'=>'2.19568467',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:30:59',
          'updated_at'=>'2019-04-03 06:30:59'
          ],



          [
          'id'=>8,
          'lab_detail_id'=>4,
          'patient_id'=>'1',
          'lab_approve'=>'0.909363508',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:30:59',
          'updated_at'=>'2019-04-03 06:30:59'
          ],



          [
          'id'=>9,
          'lab_detail_id'=>19,
          'patient_id'=>'6',
          'lab_approve'=>'0.736071587',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:32:09',
          'updated_at'=>'2019-04-03 06:32:09'
          ],



          [
          'id'=>10,
          'lab_detail_id'=>20,
          'patient_id'=>'6',
          'lab_approve'=>'16.8294086',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:32:09',
          'updated_at'=>'2019-04-03 06:32:09'
          ],



          [
          'id'=>11,
          'lab_detail_id'=>21,
          'patient_id'=>'6',
          'lab_approve'=>'2.58310938',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:32:09',
          'updated_at'=>'2019-04-03 06:32:09'
          ],



          [
          'id'=>12,
          'lab_detail_id'=>23,
          'patient_id'=>'5',
          'lab_approve'=>'1.10251546',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:03',
          'updated_at'=>'2019-04-03 06:33:03'
          ],



          [
          'id'=>13,
          'lab_detail_id'=>22,
          'patient_id'=>'5',
          'lab_approve'=>'4.04798651',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:03',
          'updated_at'=>'2019-04-03 06:33:03'
          ],



          [
          'id'=>14,
          'lab_detail_id'=>11,
          'patient_id'=>'4',
          'lab_approve'=>'0.725866795',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>15,
          'lab_detail_id'=>12,
          'patient_id'=>'4',
          'lab_approve'=>'77.7774811',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>16,
          'lab_detail_id'=>13,
          'patient_id'=>'4',
          'lab_approve'=>'18.1988945',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>17,
          'lab_detail_id'=>14,
          'patient_id'=>'4',
          'lab_approve'=>'38.0370293',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>18,
          'lab_detail_id'=>16,
          'patient_id'=>'4',
          'lab_approve'=>'18.4995575',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>19,
          'lab_detail_id'=>17,
          'patient_id'=>'4',
          'lab_approve'=>'1.22662342',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>20,
          'lab_detail_id'=>18,
          'patient_id'=>'4',
          'lab_approve'=>'2.27314925',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>21,
          'lab_detail_id'=>15,
          'patient_id'=>'4',
          'lab_approve'=>'3.06388474',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 06:33:21',
          'updated_at'=>'2019-04-03 06:33:21'
          ],



          [
          'id'=>22,
          'lab_detail_id'=>36,
          'patient_id'=>'12',
          'lab_approve'=>'2.54474545',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:05:13',
          'updated_at'=>'2019-04-03 08:05:13'
          ],



          [
          'id'=>23,
          'lab_detail_id'=>38,
          'patient_id'=>'12',
          'lab_approve'=>'111.744835',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:05:13',
          'updated_at'=>'2019-04-03 08:05:13'
          ],



          [
          'id'=>24,
          'lab_detail_id'=>37,
          'patient_id'=>'12',
          'lab_approve'=>'1.74234962',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:05:13',
          'updated_at'=>'2019-04-03 08:05:13'
          ],



          [
          'id'=>25,
          'lab_detail_id'=>42,
          'patient_id'=>'13',
          'lab_approve'=>'266.441467',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:07:19',
          'updated_at'=>'2019-04-03 08:07:19'
          ],



          [
          'id'=>26,
          'lab_detail_id'=>41,
          'patient_id'=>'13',
          'lab_approve'=>'5.15965796',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:07:20',
          'updated_at'=>'2019-04-03 08:07:20'
          ],



          [
          'id'=>27,
          'lab_detail_id'=>25,
          'patient_id'=>'8',
          'lab_approve'=>'1.00565076',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:07:54',
          'updated_at'=>'2019-04-03 08:07:54'
          ],



          [
          'id'=>28,
          'lab_detail_id'=>26,
          'patient_id'=>'8',
          'lab_approve'=>'0.415672779',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:07:54',
          'updated_at'=>'2019-04-03 08:07:54'
          ],



          [
          'id'=>29,
          'lab_detail_id'=>30,
          'patient_id'=>'10',
          'lab_approve'=>'5.6210928',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:09:25',
          'updated_at'=>'2019-04-03 08:09:25'
          ],



          [
          'id'=>30,
          'lab_detail_id'=>31,
          'patient_id'=>'10',
          'lab_approve'=>'92.6687317',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:09:25',
          'updated_at'=>'2019-04-03 08:09:25'
          ],



          [
          'id'=>31,
          'lab_detail_id'=>32,
          'patient_id'=>'10',
          'lab_approve'=>'29.1043186',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:09:25',
          'updated_at'=>'2019-04-03 08:09:25'
          ],



          [
          'id'=>32,
          'lab_detail_id'=>33,
          'patient_id'=>'10',
          'lab_approve'=>'39.8048477',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:09:25',
          'updated_at'=>'2019-04-03 08:09:25'
          ],



          [
          'id'=>33,
          'lab_detail_id'=>27,
          'patient_id'=>'9',
          'lab_approve'=>'0.933006048',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:39:43',
          'updated_at'=>'2019-04-03 08:39:43'
          ],



          [
          'id'=>34,
          'lab_detail_id'=>29,
          'patient_id'=>'9',
          'lab_approve'=>'39.2797775',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:39:44',
          'updated_at'=>'2019-04-03 08:39:44'
          ],



          [
          'id'=>35,
          'lab_detail_id'=>28,
          'patient_id'=>'9',
          'lab_approve'=>'0.509539485',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-03 08:39:44',
          'updated_at'=>'2019-04-03 08:39:44'
          ],



          [
          'id'=>36,
          'lab_detail_id'=>23,
          'patient_id'=>'5',
          'lab_approve'=>'1.1',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>1,
          'created_at'=>'2019-04-03 08:56:43',
          'updated_at'=>'2019-04-03 08:56:43'
          ],



          [
          'id'=>37,
          'lab_detail_id'=>50,
          'patient_id'=>'18',
          'lab_approve'=>'6.18370724',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:23',
          'updated_at'=>'2019-04-04 04:12:23'
          ],



          [
          'id'=>38,
          'lab_detail_id'=>51,
          'patient_id'=>'18',
          'lab_approve'=>'104.246803',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:23',
          'updated_at'=>'2019-04-04 04:12:23'
          ],



          [
          'id'=>39,
          'lab_detail_id'=>52,
          'patient_id'=>'18',
          'lab_approve'=>'30.0755005',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>40,
          'lab_detail_id'=>53,
          'patient_id'=>'18',
          'lab_approve'=>'39.2381058',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>41,
          'lab_detail_id'=>55,
          'patient_id'=>'18',
          'lab_approve'=>'264.43103',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>42,
          'lab_detail_id'=>56,
          'patient_id'=>'18',
          'lab_approve'=>'2.11370206',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>43,
          'lab_detail_id'=>57,
          'patient_id'=>'18',
          'lab_approve'=>'5.79136038',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>44,
          'lab_detail_id'=>54,
          'patient_id'=>'18',
          'lab_approve'=>'4.56441975',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 04:12:24',
          'updated_at'=>'2019-04-04 04:12:24'
          ],



          [
          'id'=>45,
          'lab_detail_id'=>71,
          'patient_id'=>'21',
          'lab_approve'=>'1.7152698',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 08:39:51',
          'updated_at'=>'2019-04-04 08:39:51'
          ],



          [
          'id'=>46,
          'lab_detail_id'=>73,
          'patient_id'=>'21',
          'lab_approve'=>'71.1316299',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 08:39:51',
          'updated_at'=>'2019-04-04 08:39:51'
          ],



          [
          'id'=>47,
          'lab_detail_id'=>72,
          'patient_id'=>'21',
          'lab_approve'=>'1.15192044',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 08:39:51',
          'updated_at'=>'2019-04-04 08:39:51'
          ],



          [
          'id'=>48,
          'lab_detail_id'=>81,
          'patient_id'=>'23',
          'lab_approve'=>'6.13569355',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:01:54',
          'updated_at'=>'2019-04-04 09:01:54'
          ],



          [
          'id'=>49,
          'lab_detail_id'=>82,
          'patient_id'=>'23',
          'lab_approve'=>'32.9090691',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:01:54',
          'updated_at'=>'2019-04-04 09:01:54'
          ],



          [
          'id'=>50,
          'lab_detail_id'=>83,
          'patient_id'=>'23',
          'lab_approve'=>'43.9326248',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:01:54',
          'updated_at'=>'2019-04-04 09:01:54'
          ],



          [
          'id'=>51,
          'lab_detail_id'=>84,
          'patient_id'=>'23',
          'lab_approve'=>'103.57412',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:01:54',
          'updated_at'=>'2019-04-04 09:01:54'
          ],



          [
          'id'=>52,
          'lab_detail_id'=>85,
          'patient_id'=>'23',
          'lab_approve'=>'4.95784616',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:01:54',
          'updated_at'=>'2019-04-04 09:01:54'
          ],



          [
          'id'=>53,
          'lab_detail_id'=>66,
          'patient_id'=>'20',
          'lab_approve'=>'0.811299324',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:11',
          'updated_at'=>'2019-04-04 09:02:11'
          ],



          [
          'id'=>54,
          'lab_detail_id'=>68,
          'patient_id'=>'20',
          'lab_approve'=>'80.3242645',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:11',
          'updated_at'=>'2019-04-04 09:02:11'
          ],



          [
          'id'=>55,
          'lab_detail_id'=>69,
          'patient_id'=>'20',
          'lab_approve'=>'17.0743008',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:11',
          'updated_at'=>'2019-04-04 09:02:11'
          ],



          [
          'id'=>56,
          'lab_detail_id'=>70,
          'patient_id'=>'20',
          'lab_approve'=>'36.9440842',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:12',
          'updated_at'=>'2019-04-04 09:02:12'
          ],



          [
          'id'=>57,
          'lab_detail_id'=>67,
          'patient_id'=>'20',
          'lab_approve'=>'3.10248303',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:12',
          'updated_at'=>'2019-04-04 09:02:12'
          ],



          [
          'id'=>58,
          'lab_detail_id'=>58,
          'patient_id'=>'19',
          'lab_approve'=>'0.933800459',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:29',
          'updated_at'=>'2019-04-04 09:02:29'
          ],



          [
          'id'=>59,
          'lab_detail_id'=>59,
          'patient_id'=>'19',
          'lab_approve'=>'18.2766933',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:29',
          'updated_at'=>'2019-04-04 09:02:29'
          ],



          [
          'id'=>60,
          'lab_detail_id'=>60,
          'patient_id'=>'19',
          'lab_approve'=>'44.6675339',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>61,
          'lab_detail_id'=>61,
          'patient_id'=>'19',
          'lab_approve'=>'97.7481842',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>62,
          'lab_detail_id'=>63,
          'patient_id'=>'19',
          'lab_approve'=>'1.46206129',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>63,
          'lab_detail_id'=>64,
          'patient_id'=>'19',
          'lab_approve'=>'22.2070732',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>64,
          'lab_detail_id'=>65,
          'patient_id'=>'19',
          'lab_approve'=>'2.60553908',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>65,
          'lab_detail_id'=>62,
          'patient_id'=>'19',
          'lab_approve'=>'3.56476331',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:30',
          'updated_at'=>'2019-04-04 09:02:30'
          ],



          [
          'id'=>66,
          'lab_detail_id'=>86,
          'patient_id'=>'24',
          'lab_approve'=>'3.63583422',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:47',
          'updated_at'=>'2019-04-04 09:02:47'
          ],



          [
          'id'=>67,
          'lab_detail_id'=>87,
          'patient_id'=>'24',
          'lab_approve'=>'69.0657349',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:47',
          'updated_at'=>'2019-04-04 09:02:47'
          ],



          [
          'id'=>68,
          'lab_detail_id'=>88,
          'patient_id'=>'24',
          'lab_approve'=>'16.493042',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:47',
          'updated_at'=>'2019-04-04 09:02:47'
          ],



          [
          'id'=>69,
          'lab_detail_id'=>89,
          'patient_id'=>'24',
          'lab_approve'=>'24.2321167',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:47',
          'updated_at'=>'2019-04-04 09:02:47'
          ],



          [
          'id'=>70,
          'lab_detail_id'=>91,
          'patient_id'=>'24',
          'lab_approve'=>'3.83252645',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:48',
          'updated_at'=>'2019-04-04 09:02:48'
          ],



          [
          'id'=>71,
          'lab_detail_id'=>90,
          'patient_id'=>'24',
          'lab_approve'=>'2.85517955',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 09:02:48',
          'updated_at'=>'2019-04-04 09:02:48'
          ],



          [
          'id'=>72,
          'lab_detail_id'=>110,
          'patient_id'=>'29',
          'lab_approve'=>'6.00960207',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:28:09',
          'updated_at'=>'2019-04-04 11:28:09'
          ],



          [
          'id'=>73,
          'lab_detail_id'=>109,
          'patient_id'=>'29',
          'lab_approve'=>'5.05308867',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:28:09',
          'updated_at'=>'2019-04-04 11:28:09'
          ],



          [
          'id'=>74,
          'lab_detail_id'=>111,
          'patient_id'=>'35',
          'lab_approve'=>'0.283382088',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:32:02',
          'updated_at'=>'2019-04-04 11:32:02'
          ],



          [
          'id'=>75,
          'lab_detail_id'=>112,
          'patient_id'=>'35',
          'lab_approve'=>'2.62761188',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:32:02',
          'updated_at'=>'2019-04-04 11:32:02'
          ],



          [
          'id'=>76,
          'lab_detail_id'=>113,
          'patient_id'=>'35',
          'lab_approve'=>'1.1200068',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:32:02',
          'updated_at'=>'2019-04-04 11:32:02'
          ],



          [
          'id'=>77,
          'lab_detail_id'=>115,
          'patient_id'=>'35',
          'lab_approve'=>'0.708705664',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:32:02',
          'updated_at'=>'2019-04-04 11:32:02'
          ],



          [
          'id'=>78,
          'lab_detail_id'=>114,
          'patient_id'=>'35',
          'lab_approve'=>'-0.0221740417',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:32:02',
          'updated_at'=>'2019-04-04 11:32:02'
          ],



          [
          'id'=>79,
          'lab_detail_id'=>128,
          'patient_id'=>'31',
          'lab_approve'=>'71.0488434',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:58:49',
          'updated_at'=>'2019-04-04 11:58:49'
          ],



          [
          'id'=>80,
          'lab_detail_id'=>129,
          'patient_id'=>'31',
          'lab_approve'=>'0.62696743',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:58:49',
          'updated_at'=>'2019-04-04 11:58:49'
          ],



          [
          'id'=>81,
          'lab_detail_id'=>130,
          'patient_id'=>'31',
          'lab_approve'=>'1.88099551',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:58:49',
          'updated_at'=>'2019-04-04 11:58:49'
          ],



          [
          'id'=>82,
          'lab_detail_id'=>127,
          'patient_id'=>'31',
          'lab_approve'=>'1.29206157',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 11:58:49',
          'updated_at'=>'2019-04-04 11:58:49'
          ],



          [
          'id'=>83,
          'lab_detail_id'=>132,
          'patient_id'=>'32',
          'lab_approve'=>'110.684013',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>84,
          'lab_detail_id'=>133,
          'patient_id'=>'32',
          'lab_approve'=>'21.2917233',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>85,
          'lab_detail_id'=>134,
          'patient_id'=>'32',
          'lab_approve'=>'50.0667267',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>86,
          'lab_detail_id'=>135,
          'patient_id'=>'32',
          'lab_approve'=>'22.9766636',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>87,
          'lab_detail_id'=>136,
          'patient_id'=>'32',
          'lab_approve'=>'1.45178068',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>88,
          'lab_detail_id'=>137,
          'patient_id'=>'32',
          'lab_approve'=>'2.59825301',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:37',
          'updated_at'=>'2019-04-04 12:00:37'
          ],



          [
          'id'=>89,
          'lab_detail_id'=>131,
          'patient_id'=>'32',
          'lab_approve'=>'3.14681673',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:00:38',
          'updated_at'=>'2019-04-04 12:00:38'
          ],



          [
          'id'=>90,
          'lab_detail_id'=>124,
          'patient_id'=>'33',
          'lab_approve'=>'19.6590328',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:02:24',
          'updated_at'=>'2019-04-04 12:02:24'
          ],



          [
          'id'=>91,
          'lab_detail_id'=>125,
          'patient_id'=>'33',
          'lab_approve'=>'1.28286886',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:02:24',
          'updated_at'=>'2019-04-04 12:02:24'
          ],



          [
          'id'=>92,
          'lab_detail_id'=>126,
          'patient_id'=>'33',
          'lab_approve'=>'2.18057752',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:02:24',
          'updated_at'=>'2019-04-04 12:02:24'
          ],



          [
          'id'=>93,
          'lab_detail_id'=>123,
          'patient_id'=>'33',
          'lab_approve'=>'2.64217257',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-04 12:02:24',
          'updated_at'=>'2019-04-04 12:02:24'
          ],



          [
          'id'=>94,
          'lab_detail_id'=>101,
          'patient_id'=>'27',
          'lab_approve'=>'0.755922496',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-05 04:58:19',
          'updated_at'=>'2019-04-05 04:58:19'
          ],



          [
          'id'=>95,
          'lab_detail_id'=>116,
          'patient_id'=>'34',
          'lab_approve'=>'0.830021501',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-05 05:03:24',
          'updated_at'=>'2019-04-05 05:03:24'
          ],



          [
          'id'=>96,
          'lab_detail_id'=>117,
          'patient_id'=>'34',
          'lab_approve'=>'1.70382333',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-05 05:03:24',
          'updated_at'=>'2019-04-05 05:03:24'
          ],



          [
          'id'=>97,
          'lab_detail_id'=>118,
          'patient_id'=>'34',
          'lab_approve'=>'1.84022474',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-05 05:03:24',
          'updated_at'=>'2019-04-05 05:03:24'
          ],



          [
          'id'=>98,
          'lab_detail_id'=>119,
          'patient_id'=>'34',
          'lab_approve'=>'0.649669051',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-05 05:03:24',
          'updated_at'=>'2019-04-05 05:03:24'
          ],



          [
          'id'=>99,
          'lab_detail_id'=>103,
          'patient_id'=>'28',
          'lab_approve'=>'-2.17396832',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>100,
          'lab_detail_id'=>104,
          'patient_id'=>'28',
          'lab_approve'=>'2.59224772',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>101,
          'lab_detail_id'=>105,
          'patient_id'=>'28',
          'lab_approve'=>'3.83770895',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>102,
          'lab_detail_id'=>106,
          'patient_id'=>'28',
          'lab_approve'=>'0.570629656',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>103,
          'lab_detail_id'=>108,
          'patient_id'=>'28',
          'lab_approve'=>'1.21884084',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>104,
          'lab_detail_id'=>107,
          'patient_id'=>'28',
          'lab_approve'=>'0.08716093',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-05 09:26:28',
          'updated_at'=>'2019-04-05 09:26:28'
          ],



          [
          'id'=>105,
          'lab_detail_id'=>103,
          'patient_id'=>'28',
          'lab_approve'=>'0',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>1,
          'created_at'=>'2019-04-05 11:50:16',
          'updated_at'=>'2019-04-05 11:50:16'
          ],



          [
          'id'=>106,
          'lab_detail_id'=>107,
          'patient_id'=>'28',
          'lab_approve'=>'-1',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>1,
          'created_at'=>'2019-04-05 11:50:24',
          'updated_at'=>'2019-04-05 11:50:24'
          ],



          [
          'id'=>107,
          'lab_detail_id'=>150,
          'patient_id'=>'39',
          'lab_approve'=>'6.08814001',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:07:18',
          'updated_at'=>'2019-04-06 06:07:18'
          ],



          [
          'id'=>108,
          'lab_detail_id'=>151,
          'patient_id'=>'39',
          'lab_approve'=>'3.9925499',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:07:18',
          'updated_at'=>'2019-04-06 06:07:18'
          ],



          [
          'id'=>109,
          'lab_detail_id'=>152,
          'patient_id'=>'40',
          'lab_approve'=>'7.37648487',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:03',
          'updated_at'=>'2019-04-06 06:08:03'
          ],



          [
          'id'=>110,
          'lab_detail_id'=>153,
          'patient_id'=>'40',
          'lab_approve'=>'2.55049729',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:03',
          'updated_at'=>'2019-04-06 06:08:03'
          ],



          [
          'id'=>111,
          'lab_detail_id'=>154,
          'patient_id'=>'40',
          'lab_approve'=>'22.1703434',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:04',
          'updated_at'=>'2019-04-06 06:08:04'
          ],



          [
          'id'=>112,
          'lab_detail_id'=>141,
          'patient_id'=>'37',
          'lab_approve'=>'39.5210457',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:04',
          'updated_at'=>'2019-04-06 06:08:04'
          ],



          [
          'id'=>113,
          'lab_detail_id'=>142,
          'patient_id'=>'37',
          'lab_approve'=>'6.57474661',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:05',
          'updated_at'=>'2019-04-06 06:08:05'
          ],



          [
          'id'=>114,
          'lab_detail_id'=>143,
          'patient_id'=>'37',
          'lab_approve'=>'11.3914204',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:05',
          'updated_at'=>'2019-04-06 06:08:05'
          ],



          [
          'id'=>115,
          'lab_detail_id'=>144,
          'patient_id'=>'37',
          'lab_approve'=>'78.6490326',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:05',
          'updated_at'=>'2019-04-06 06:08:05'
          ],



          [
          'id'=>116,
          'lab_detail_id'=>145,
          'patient_id'=>'37',
          'lab_approve'=>'3.33918333',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:05',
          'updated_at'=>'2019-04-06 06:08:05'
          ],



          [
          'id'=>117,
          'lab_detail_id'=>146,
          'patient_id'=>'37',
          'lab_approve'=>'1.98839867',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:08:05',
          'updated_at'=>'2019-04-06 06:08:05'
          ],



          [
          'id'=>118,
          'lab_detail_id'=>147,
          'patient_id'=>'38',
          'lab_approve'=>'111.882683',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:09:43',
          'updated_at'=>'2019-04-06 06:09:43'
          ],



          [
          'id'=>119,
          'lab_detail_id'=>148,
          'patient_id'=>'38',
          'lab_approve'=>'20.1202698',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:09:43',
          'updated_at'=>'2019-04-06 06:09:43'
          ],



          [
          'id'=>120,
          'lab_detail_id'=>149,
          'patient_id'=>'38',
          'lab_approve'=>'50.7098846',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-06 06:09:44',
          'updated_at'=>'2019-04-06 06:09:44'
          ],



          [
          'id'=>121,
          'lab_detail_id'=>178,
          'patient_id'=>'3',
          'lab_approve'=>'0.987501383',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-06 08:15:48',
          'updated_at'=>'2019-04-06 08:15:48'
          ],



          [
          'id'=>122,
          'lab_detail_id'=>179,
          'patient_id'=>'3',
          'lab_approve'=>'7.24457264',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-06 08:15:48',
          'updated_at'=>'2019-04-06 08:15:48'
          ],



          [
          'id'=>123,
          'lab_detail_id'=>176,
          'patient_id'=>'34',
          'lab_approve'=>'3.96672106',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-06 08:41:36',
          'updated_at'=>'2019-04-06 08:41:36'
          ],



          [
          'id'=>124,
          'lab_detail_id'=>194,
          'patient_id'=>'45',
          'lab_approve'=>'0.18269968',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>125,
          'lab_detail_id'=>195,
          'patient_id'=>'45',
          'lab_approve'=>'0.156335831',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>126,
          'lab_detail_id'=>196,
          'patient_id'=>'45',
          'lab_approve'=>'0.621332824',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>127,
          'lab_detail_id'=>197,
          'patient_id'=>'45',
          'lab_approve'=>'4.7921772',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>128,
          'lab_detail_id'=>198,
          'patient_id'=>'45',
          'lab_approve'=>'0.637808442',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>129,
          'lab_detail_id'=>199,
          'patient_id'=>'45',
          'lab_approve'=>'1.85601008',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>130,
          'lab_detail_id'=>200,
          'patient_id'=>'45',
          'lab_approve'=>'1.17048943',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-06 10:44:25',
          'updated_at'=>'2019-04-06 10:44:25'
          ],



          [
          'id'=>131,
          'lab_detail_id'=>228,
          'patient_id'=>'50',
          'lab_approve'=>'2.15667915',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-07 06:48:26',
          'updated_at'=>'2019-04-07 06:48:26'
          ],



          [
          'id'=>132,
          'lab_detail_id'=>229,
          'patient_id'=>'50',
          'lab_approve'=>'2.72797346',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-07 06:48:26',
          'updated_at'=>'2019-04-07 06:48:26'
          ],



          [
          'id'=>133,
          'lab_detail_id'=>230,
          'patient_id'=>'50',
          'lab_approve'=>'89.5149307',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-07 06:48:26',
          'updated_at'=>'2019-04-07 06:48:26'
          ],



          [
          'id'=>134,
          'lab_detail_id'=>231,
          'patient_id'=>'50',
          'lab_approve'=>'2.0792284',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-07 06:48:26',
          'updated_at'=>'2019-04-07 06:48:26'
          ],



          [
          'id'=>135,
          'lab_detail_id'=>232,
          'patient_id'=>'3',
          'lab_approve'=>'1.97591639',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-07 11:42:39',
          'updated_at'=>'2019-04-07 11:42:39'
          ],



          [
          'id'=>136,
          'lab_detail_id'=>243,
          'patient_id'=>'55',
          'lab_approve'=>'2.10913754',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 11:36:54',
          'updated_at'=>'2019-04-08 11:36:54'
          ],



          [
          'id'=>137,
          'lab_detail_id'=>244,
          'patient_id'=>'55',
          'lab_approve'=>'91.2174225',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-08 11:36:54',
          'updated_at'=>'2019-04-08 11:36:54'
          ],



          [
          'id'=>138,
          'lab_detail_id'=>245,
          'patient_id'=>'55',
          'lab_approve'=>'3.15349579',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-08 11:36:54',
          'updated_at'=>'2019-04-08 11:36:54'
          ],



          [
          'id'=>139,
          'lab_detail_id'=>252,
          'patient_id'=>'4',
          'lab_approve'=>'4.42043018',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:01:53',
          'updated_at'=>'2019-04-08 18:01:53'
          ],



          [
          'id'=>140,
          'lab_detail_id'=>253,
          'patient_id'=>'5',
          'lab_approve'=>'1.5358994',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:02:11',
          'updated_at'=>'2019-04-08 18:02:11'
          ],



          [
          'id'=>141,
          'lab_detail_id'=>255,
          'patient_id'=>'3',
          'lab_approve'=>'7.04663944',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:02:29',
          'updated_at'=>'2019-04-08 18:02:29'
          ],



          [
          'id'=>142,
          'lab_detail_id'=>254,
          'patient_id'=>'7',
          'lab_approve'=>'0.0639300346',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:02:47',
          'updated_at'=>'2019-04-08 18:02:47'
          ],



          [
          'id'=>143,
          'lab_detail_id'=>246,
          'patient_id'=>'56',
          'lab_approve'=>'1.11076307',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:06:44',
          'updated_at'=>'2019-04-08 18:06:44'
          ],



          [
          'id'=>144,
          'lab_detail_id'=>247,
          'patient_id'=>'56',
          'lab_approve'=>'48.6714668',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:06:44',
          'updated_at'=>'2019-04-08 18:06:44'
          ],



          [
          'id'=>145,
          'lab_detail_id'=>248,
          'patient_id'=>'56',
          'lab_approve'=>'1.02532625',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-08 18:06:44',
          'updated_at'=>'2019-04-08 18:06:44'
          ],



          [
          'id'=>146,
          'lab_detail_id'=>262,
          'patient_id'=>'53',
          'lab_approve'=>'1.21065402',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:12:49',
          'updated_at'=>'2019-04-08 19:12:49'
          ],



          [
          'id'=>147,
          'lab_detail_id'=>263,
          'patient_id'=>'53',
          'lab_approve'=>'30.2349453',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:12:49',
          'updated_at'=>'2019-04-08 19:12:49'
          ],



          [
          'id'=>148,
          'lab_detail_id'=>264,
          'patient_id'=>'53',
          'lab_approve'=>'7.80228615',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:12:49',
          'updated_at'=>'2019-04-08 19:12:49'
          ],



          [
          'id'=>149,
          'lab_detail_id'=>256,
          'patient_id'=>'2',
          'lab_approve'=>'1.45361018',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:35:14',
          'updated_at'=>'2019-04-08 19:35:14'
          ],



          [
          'id'=>150,
          'lab_detail_id'=>257,
          'patient_id'=>'2',
          'lab_approve'=>'48.5767365',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:35:14',
          'updated_at'=>'2019-04-08 19:35:14'
          ],



          [
          'id'=>151,
          'lab_detail_id'=>258,
          'patient_id'=>'2',
          'lab_approve'=>'6.9462204',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-08 19:35:14',
          'updated_at'=>'2019-04-08 19:35:14'
          ],



          [
          'id'=>152,
          'lab_detail_id'=>271,
          'patient_id'=>'53',
          'lab_approve'=>'0.136109352',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:14:05',
          'updated_at'=>'2019-04-08 20:14:05'
          ],



          [
          'id'=>153,
          'lab_detail_id'=>274,
          'patient_id'=>'2',
          'lab_approve'=>'1.50524831',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:14:23',
          'updated_at'=>'2019-04-08 20:14:23'
          ],



          [
          'id'=>154,
          'lab_detail_id'=>273,
          'patient_id'=>'4',
          'lab_approve'=>'1.47527742',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:14:42',
          'updated_at'=>'2019-04-08 20:14:42'
          ],



          [
          'id'=>155,
          'lab_detail_id'=>272,
          'patient_id'=>'53',
          'lab_approve'=>'1.24706197',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:14:59',
          'updated_at'=>'2019-04-08 20:14:59'
          ],



          [
          'id'=>156,
          'lab_detail_id'=>265,
          'patient_id'=>'52',
          'lab_approve'=>'1.04712558',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:21:00',
          'updated_at'=>'2019-04-08 20:21:00'
          ],



          [
          'id'=>157,
          'lab_detail_id'=>266,
          'patient_id'=>'52',
          'lab_approve'=>'28.1322117',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:21:00',
          'updated_at'=>'2019-04-08 20:21:00'
          ],



          [
          'id'=>158,
          'lab_detail_id'=>267,
          'patient_id'=>'52',
          'lab_approve'=>'7.425735',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:21:00',
          'updated_at'=>'2019-04-08 20:21:00'
          ],



          [
          'id'=>159,
          'lab_detail_id'=>270,
          'patient_id'=>'52',
          'lab_approve'=>'7.08317757',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:34:26',
          'updated_at'=>'2019-04-08 20:34:26'
          ],



          [
          'id'=>160,
          'lab_detail_id'=>276,
          'patient_id'=>'3',
          'lab_approve'=>'4.53191614',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:53:16',
          'updated_at'=>'2019-04-08 20:53:16'
          ],



          [
          'id'=>161,
          'lab_detail_id'=>275,
          'patient_id'=>'1',
          'lab_approve'=>'0.134526014',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 20:53:34',
          'updated_at'=>'2019-04-08 20:53:34'
          ],



          [
          'id'=>162,
          'lab_detail_id'=>277,
          'patient_id'=>'38',
          'lab_approve'=>'0.0996675491',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:14:39',
          'updated_at'=>'2019-04-08 21:14:39'
          ],



          [
          'id'=>163,
          'lab_detail_id'=>279,
          'patient_id'=>'23',
          'lab_approve'=>'1.11015534',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:14:57',
          'updated_at'=>'2019-04-08 21:14:57'
          ],



          [
          'id'=>164,
          'lab_detail_id'=>278,
          'patient_id'=>'31',
          'lab_approve'=>'0.0958995819',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:15:15',
          'updated_at'=>'2019-04-08 21:15:15'
          ],



          [
          'id'=>165,
          'lab_detail_id'=>281,
          'patient_id'=>'21',
          'lab_approve'=>'0.171162605',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:15:33',
          'updated_at'=>'2019-04-08 21:15:33'
          ],



          [
          'id'=>166,
          'lab_detail_id'=>280,
          'patient_id'=>'21',
          'lab_approve'=>'0.0211601257',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:15:50',
          'updated_at'=>'2019-04-08 21:15:50'
          ],



          [
          'id'=>167,
          'lab_detail_id'=>284,
          'patient_id'=>'9',
          'lab_approve'=>'1.32995129',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:57:43',
          'updated_at'=>'2019-04-08 21:57:43'
          ],



          [
          'id'=>168,
          'lab_detail_id'=>283,
          'patient_id'=>'1',
          'lab_approve'=>'1.05262685',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:58:01',
          'updated_at'=>'2019-04-08 21:58:01'
          ],



          [
          'id'=>169,
          'lab_detail_id'=>282,
          'patient_id'=>'2',
          'lab_approve'=>'0.0868082047',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 21:58:19',
          'updated_at'=>'2019-04-08 21:58:19'
          ],



          [
          'id'=>170,
          'lab_detail_id'=>290,
          'patient_id'=>'16',
          'lab_approve'=>'0.083334446',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:24:36',
          'updated_at'=>'2019-04-08 22:24:36'
          ],



          [
          'id'=>171,
          'lab_detail_id'=>289,
          'patient_id'=>'18',
          'lab_approve'=>'7.08653545',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:24:53',
          'updated_at'=>'2019-04-08 22:24:53'
          ],



          [
          'id'=>172,
          'lab_detail_id'=>287,
          'patient_id'=>'25',
          'lab_approve'=>'0.10848856',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:25:11',
          'updated_at'=>'2019-04-08 22:25:11'
          ],



          [
          'id'=>173,
          'lab_detail_id'=>286,
          'patient_id'=>'47',
          'lab_approve'=>'4.491889',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:25:30',
          'updated_at'=>'2019-04-08 22:25:30'
          ],



          [
          'id'=>174,
          'lab_detail_id'=>285,
          'patient_id'=>'1',
          'lab_approve'=>'1.07478547',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:25:47',
          'updated_at'=>'2019-04-08 22:25:47'
          ],



          [
          'id'=>175,
          'lab_detail_id'=>288,
          'patient_id'=>'13',
          'lab_approve'=>'0.272873402',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 22:44:33',
          'updated_at'=>'2019-04-08 22:44:33'
          ],



          [
          'id'=>176,
          'lab_detail_id'=>292,
          'patient_id'=>'6',
          'lab_approve'=>'1.65254545',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 23:05:03',
          'updated_at'=>'2019-04-08 23:05:03'
          ],



          [
          'id'=>177,
          'lab_detail_id'=>293,
          'patient_id'=>'1',
          'lab_approve'=>'0.148351669',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-08 23:47:33',
          'updated_at'=>'2019-04-08 23:47:33'
          ],



          [
          'id'=>178,
          'lab_detail_id'=>295,
          'patient_id'=>'2',
          'lab_approve'=>'0.104358673',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:19:26',
          'updated_at'=>'2019-04-09 00:19:26'
          ],



          [
          'id'=>179,
          'lab_detail_id'=>294,
          'patient_id'=>'3',
          'lab_approve'=>'1.0929966',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:19:43',
          'updated_at'=>'2019-04-09 00:19:43'
          ],



          [
          'id'=>180,
          'lab_detail_id'=>296,
          'patient_id'=>'3',
          'lab_approve'=>'7.14264584',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:20:01',
          'updated_at'=>'2019-04-09 00:20:01'
          ],



          [
          'id'=>181,
          'lab_detail_id'=>297,
          'patient_id'=>'4',
          'lab_approve'=>'0.151640415',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:20:19',
          'updated_at'=>'2019-04-09 00:20:19'
          ],



          [
          'id'=>182,
          'lab_detail_id'=>300,
          'patient_id'=>'5',
          'lab_approve'=>'1.56181884',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:44:20',
          'updated_at'=>'2019-04-09 00:44:20'
          ],



          [
          'id'=>183,
          'lab_detail_id'=>299,
          'patient_id'=>'6',
          'lab_approve'=>'4.58763552',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 00:44:37',
          'updated_at'=>'2019-04-09 00:44:37'
          ],



          [
          'id'=>184,
          'lab_detail_id'=>302,
          'patient_id'=>'8',
          'lab_approve'=>'0.156351089',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 01:05:09',
          'updated_at'=>'2019-04-09 01:05:09'
          ],



          [
          'id'=>185,
          'lab_detail_id'=>301,
          'patient_id'=>'35',
          'lab_approve'=>'0.0795931816',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 01:05:26',
          'updated_at'=>'2019-04-09 01:05:26'
          ],



          [
          'id'=>186,
          'lab_detail_id'=>304,
          'patient_id'=>'25',
          'lab_approve'=>'1.01602149',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 02:32:36',
          'updated_at'=>'2019-04-09 02:32:36'
          ],



          [
          'id'=>187,
          'lab_detail_id'=>329,
          'patient_id'=>'6',
          'lab_approve'=>'1.03147268',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 06:41:06',
          'updated_at'=>'2019-04-09 06:41:06'
          ],



          [
          'id'=>188,
          'lab_detail_id'=>333,
          'patient_id'=>'64',
          'lab_approve'=>'1.48052263',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:30:05',
          'updated_at'=>'2019-04-09 08:30:05'
          ],



          [
          'id'=>189,
          'lab_detail_id'=>334,
          'patient_id'=>'65',
          'lab_approve'=>'1.20397925',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:30:40',
          'updated_at'=>'2019-04-09 08:30:40'
          ],



          [
          'id'=>190,
          'lab_detail_id'=>335,
          'patient_id'=>'65',
          'lab_approve'=>'50.9657631',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:30:40',
          'updated_at'=>'2019-04-09 08:30:40'
          ],



          [
          'id'=>191,
          'lab_detail_id'=>336,
          'patient_id'=>'65',
          'lab_approve'=>'1.62798166',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:30:40',
          'updated_at'=>'2019-04-09 08:30:40'
          ],



          [
          'id'=>192,
          'lab_detail_id'=>338,
          'patient_id'=>'67',
          'lab_approve'=>'0.108127117',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:52',
          'updated_at'=>'2019-04-09 08:31:52'
          ],



          [
          'id'=>193,
          'lab_detail_id'=>339,
          'patient_id'=>'67',
          'lab_approve'=>'-31.9806175',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:52',
          'updated_at'=>'2019-04-09 08:31:52'
          ],



          [
          'id'=>194,
          'lab_detail_id'=>340,
          'patient_id'=>'67',
          'lab_approve'=>'-0.421696395',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:52',
          'updated_at'=>'2019-04-09 08:31:52'
          ],



          [
          'id'=>195,
          'lab_detail_id'=>341,
          'patient_id'=>'67',
          'lab_approve'=>'-1.78856182',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:52',
          'updated_at'=>'2019-04-09 08:31:52'
          ],



          [
          'id'=>196,
          'lab_detail_id'=>342,
          'patient_id'=>'67',
          'lab_approve'=>'3.62037539',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:52',
          'updated_at'=>'2019-04-09 08:31:52'
          ],



          [
          'id'=>197,
          'lab_detail_id'=>343,
          'patient_id'=>'67',
          'lab_approve'=>'-0.349369049',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:53',
          'updated_at'=>'2019-04-09 08:31:53'
          ],



          [
          'id'=>198,
          'lab_detail_id'=>344,
          'patient_id'=>'67',
          'lab_approve'=>'0.948619485',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:31:53',
          'updated_at'=>'2019-04-09 08:31:53'
          ],



          [
          'id'=>199,
          'lab_detail_id'=>348,
          'patient_id'=>'69',
          'lab_approve'=>'0.149575949',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:02',
          'updated_at'=>'2019-04-09 08:37:02'
          ],



          [
          'id'=>200,
          'lab_detail_id'=>349,
          'patient_id'=>'69',
          'lab_approve'=>'1.48805749',
          'user_approve'=>1,
          'item_id'=>'54',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:02',
          'updated_at'=>'2019-04-09 08:37:02'
          ],



          [
          'id'=>201,
          'lab_detail_id'=>350,
          'patient_id'=>'69',
          'lab_approve'=>'2.78619552',
          'user_approve'=>1,
          'item_id'=>'53',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:02',
          'updated_at'=>'2019-04-09 08:37:02'
          ],



          [
          'id'=>202,
          'lab_detail_id'=>351,
          'patient_id'=>'69',
          'lab_approve'=>'2.74347067',
          'user_approve'=>1,
          'item_id'=>'52',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:02',
          'updated_at'=>'2019-04-09 08:37:02'
          ],



          [
          'id'=>203,
          'lab_detail_id'=>352,
          'patient_id'=>'69',
          'lab_approve'=>'3.680439',
          'user_approve'=>1,
          'item_id'=>'45',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:02',
          'updated_at'=>'2019-04-09 08:37:02'
          ],



          [
          'id'=>204,
          'lab_detail_id'=>353,
          'patient_id'=>'69',
          'lab_approve'=>'0.0220894869',
          'user_approve'=>1,
          'item_id'=>'46',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:03',
          'updated_at'=>'2019-04-09 08:37:03'
          ],



          [
          'id'=>205,
          'lab_detail_id'=>354,
          'patient_id'=>'69',
          'lab_approve'=>'-0.745756626',
          'user_approve'=>1,
          'item_id'=>'44',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:03',
          'updated_at'=>'2019-04-09 08:37:03'
          ],



          [
          'id'=>206,
          'lab_detail_id'=>355,
          'patient_id'=>'69',
          'lab_approve'=>'0.976056397',
          'user_approve'=>1,
          'item_id'=>'47',
          'repeat'=>0,
          'created_at'=>'2019-04-09 08:37:03',
          'updated_at'=>'2019-04-09 08:37:03'
          ],



          [
          'id'=>207,
          'lab_detail_id'=>348,
          'patient_id'=>'69',
          'lab_approve'=>'-',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>1,
          'created_at'=>'2019-04-09 10:00:08',
          'updated_at'=>'2019-04-09 10:00:08'
          ],



          [
          'id'=>208,
          'lab_detail_id'=>359,
          'patient_id'=>'4',
          'lab_approve'=>'0.0794248581',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:04:59',
          'updated_at'=>'2019-04-09 11:04:59'
          ],



          [
          'id'=>209,
          'lab_detail_id'=>364,
          'patient_id'=>'34',
          'lab_approve'=>'0.146239042',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:05:17',
          'updated_at'=>'2019-04-09 11:05:17'
          ],



          [
          'id'=>210,
          'lab_detail_id'=>362,
          'patient_id'=>'16',
          'lab_approve'=>'1.52369738',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:06:11',
          'updated_at'=>'2019-04-09 11:06:11'
          ],



          [
          'id'=>211,
          'lab_detail_id'=>363,
          'patient_id'=>'15',
          'lab_approve'=>'1.23607922',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:06:28',
          'updated_at'=>'2019-04-09 11:06:28'
          ],



          [
          'id'=>212,
          'lab_detail_id'=>360,
          'patient_id'=>'4',
          'lab_approve'=>'0.0968432426',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:06:46',
          'updated_at'=>'2019-04-09 11:06:46'
          ],



          [
          'id'=>213,
          'lab_detail_id'=>358,
          'patient_id'=>'5',
          'lab_approve'=>'1.59428024',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:07:04',
          'updated_at'=>'2019-04-09 11:07:04'
          ],



          [
          'id'=>214,
          'lab_detail_id'=>337,
          'patient_id'=>'66',
          'lab_approve'=>'0.895110607',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:07:22',
          'updated_at'=>'2019-04-09 11:07:22'
          ],



          [
          'id'=>215,
          'lab_detail_id'=>366,
          'patient_id'=>'15',
          'lab_approve'=>'0.160822392',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:07:41',
          'updated_at'=>'2019-04-09 11:07:41'
          ],



          [
          'id'=>216,
          'lab_detail_id'=>365,
          'patient_id'=>'34',
          'lab_approve'=>'0.278027534',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:08:08',
          'updated_at'=>'2019-04-09 11:08:08'
          ],



          [
          'id'=>217,
          'lab_detail_id'=>368,
          'patient_id'=>'8',
          'lab_approve'=>'-0.0392098427',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:42:50',
          'updated_at'=>'2019-04-09 11:42:50'
          ],



          [
          'id'=>218,
          'lab_detail_id'=>361,
          'patient_id'=>'38',
          'lab_approve'=>'1.40698171',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 11:43:43',
          'updated_at'=>'2019-04-09 11:43:43'
          ],



          [
          'id'=>219,
          'lab_detail_id'=>369,
          'patient_id'=>'1',
          'lab_approve'=>'4.4921279',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 12:01:42',
          'updated_at'=>'2019-04-09 12:01:42'
          ],



          [
          'id'=>220,
          'lab_detail_id'=>370,
          'patient_id'=>'10',
          'lab_approve'=>'0.0925111771',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 12:02:08',
          'updated_at'=>'2019-04-09 12:02:08'
          ],



          [
          'id'=>221,
          'lab_detail_id'=>371,
          'patient_id'=>'6',
          'lab_approve'=>'0.0876717567',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 12:02:18',
          'updated_at'=>'2019-04-09 12:02:18'
          ],



          [
          'id'=>222,
          'lab_detail_id'=>372,
          'patient_id'=>'8',
          'lab_approve'=>'1.47883081',
          'user_approve'=>1,
          'item_id'=>'43',
          'repeat'=>0,
          'created_at'=>'2019-04-09 12:22:49',
          'updated_at'=>'2019-04-09 12:22:49'
          ]
        ]);*/
    }
}
