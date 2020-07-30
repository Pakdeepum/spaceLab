<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientMaster;
use App\LabOrderMain;
use App\LabOrderDetail;
use App\DoctorMaster;
use App\QcOrderDetail;
use App\QcOrderMain;
use App\LabItemMaster;
use App\LabHistory;
use App\ProfileQcMaster;
use App\ProfileQcItemDetail;
use App\AnalyzerType;

use Log;
use DB;
use Carbon\Carbon;

class BA400Controller extends Controller
{
    //

    /**
     * @param Request
     * @return Json
     */

     public function getOrder(Request $request, $barcode){

        $patient = PatientMaster::join('lab_order_main','lab_order_main.id_patient','=','patient_master.id_patient')
                    ->where('lab_order_main.lab_order_no', $barcode)
                    ->where('patient_master.stdel',0)
                    ->get([
                        'patient_master.id_patient as p_id',
                        'patient_master.patient_firstname as first_name',
                        'patient_master.patient_lastname as last_name',
                        DB::raw(" (case when (patient_master.gender = 1) THEN 'M' ELSE 'F' END) as sex")
                    ]);

         $specimen = LabOrderMain::join('lab_order_detail','lab_order_detail.id_lab_order_main','=','lab_order_main.id_lab_order_main')
            ->join('lab_item_master','lab_item_master.id_lab_item','=','lab_order_detail.id_lab_item')
            ->leftJoin('lab_specimen_item_master','lab_specimen_item_master.id_lab_specimen_item','=','lab_item_master.id_lab_specimen_item')
            ->where('lab_order_no',$barcode)
            ->where('lab_order_main.stdel',0)->get([
            'lab_order_no as specimen_id ',
            'lab_specimen_item_master.lab_specimen_item_code as specimen_type',
            DB::raw(" 'p' as specimen_role ")
         ]);

         $test = LabOrderMain::join('lab_order_detail','lab_order_detail.id_lab_order_main','=','lab_order_main.id_lab_order_main')
                                      ->join('lab_item_master','lab_item_master.id_lab_item','=','lab_order_detail.id_lab_item')
                                      ->join('doctor_master','doctor_master.id_doctor','=','lab_order_main.id_doctor')
                                      ->where('lab_order_no',$barcode)
                                      ->where('lab_order_main.stdel',0)->get([
                                          'lab_order_detail.repeat_flag as order_repeat',
                                          DB::raw('"NW" as order_control_code'),
                                          DB::raw("DATE_FORMAT(lab_order_main.date_ts,'%Y%m%d%H%m%s') as datetime_transaction"),
                                          DB::raw('"LIS Lab" as ordering_facility_name'),
                                          DB::raw('(CASE WHEN lab_order_detail.status = 1 THEN "NW"  WHEN lab_order_detail.status = 2 THEN "NW"  WHEN lab_order_detail.status = 3 THEN "IP" WHEN lab_order_detail.status = 4 THEN "CM" WHEN lab_order_detail.status = 5 THEN "CA" END) AS order_status'),
                                          'lab_item_master.lab_item_code as universal_service_identifier',
                                          'doctor_master.id_doctor as id_number',
                                          'doctor_master.doctor_name as family_name',
                                          'lab_order_detail.id_lab_order_detail as _id'
                                      ]);
        $data = [];
        if(count($test) > 0){
        for($i =0; $i < count($test); $i++){
            # code...
            $order_to_test = array(
                "_id" => $test[$i]['_id'],
                "orc" => array([
                    "order_control_code" => $test[$i]['order_control_code'],
                    "datetime_transaction" => $test[$i]['datetime_transaction'],
                    "ordering_facility_name" => $test[$i]['ordering_facility_name'],
                    "order_status" =>  $test[$i]['order_status'],
                    "order_repeat" =>  $test[$i]['order_repeat']
                ]),
                "obr" => array([
                    "place_order_number" => "",
                    "filler_order_number" => "",
                    "universal_service_identifier" => $test[$i]['universal_service_identifier'],
                    "ordering_provider" => array([
                        "id_number" =>  $test[$i]['id_number'],
                        "family_name" => $test[$i]['family_name'],
                    ])
                ])
            );

            $data[$i] = $order_to_test ;
        }
        }
        if(count($test) === 0 && count($specimen) ===0 && count($patient) ===0){
            return response()->json(['success' => true, 'status' => false,
                    'patient' => $patient, 'specimen' => $specimen, 'order_to_test' => $data]);
        }
         return response()->json(['success' => true, 'status' => true,
                    'patient' => $patient, 'specimen' => $specimen, 'order_to_test' => $data]);
     }

     /**
     * @param Request
     * @return Json
     */
    public function updateOrder(Request $request){
		Log::info('******BA400 Request*******',[$request]);
        $env = array_values($request->get('order_result'));
        $analyzer_name = "BA200";
        $analyzer_id = 2;
        if($request->get('analyzer_name')!=null){
          $analyzer_name = $request->get('analyzer_name');
          $analyzerList = AnalyzerType::where('analyzer_name',$analyzer_name)->get()->toArray();
          $analyzer_id = $analyzerList[0]['id_analyzer'];
        }
        $q = LabOrderMain::where('lab_order_no' ,$request->get('barcode'))->get();
        if(count($q)>0){
            /**update order main */
            $r = LabOrderMain::where('lab_order_no' ,'=',$request->get('barcode'))->update([
                "date_ts" => Carbon::now('Asia/Bangkok'),
                //"receive_date"  => Carbon::now('Asia/Bangkok'),
                //"note" => $env[0]['equipment_instance_identifier'],
                //"status" => $env[0]['observation_result_status_code'] === "F" ? 2 : 0,
                "id_user" => 1
            ]);

            /**update order detail */
            $status = null;
            foreach ($request->get('order_result') as $key => $value) {
                switch ($value['order_status']) {
                    case 'NW':
                        # code...
                        $status = 1;
                        break;
                    case 'IP':
                        # code...
                        $status = 2;
                        break;
                    case 'CM':
                        # code...
                        $status = 3;
                        break;
                    case 'CA':
                        # code...
                        $status = 4;
                        break;
                    default:
                        $status = 0;
                        break;
                }
                $flag = 0;
                $strAbnormalFlag = strtolower($value['abnormal_flag']);
				Log::info('Aommy test str abnormal_flag',[$strAbnormalFlag]);
                if(str_contains($strAbnormalFlag,"none")){
                    $flag = 0;
                    if (isset($value['observation_value'])){
                        $id_lab_items = LabOrderDetail::select('id_lab_item')->where('id_lab_order_detail', 13023)->get()->toArray();
                        $id_lab_item = $id_lab_items[0]['id_lab_item'];
                        // echo 'id_lab_item -> '.$id_lab_item;
                        $lab_normal_values = LabItemMaster::select('lab_normal_value')->where('id_lab_item',$id_lab_item)->get()->toArray();
                        $lab_normal_value = $lab_normal_values[0]['lab_normal_value'];
                        // echo '<br>lab_normal_value -> '.$lab_normal_value;
                        if ($lab_normal_value!=null){
                            $sub_value = explode("-",$lab_normal_value);
                            // print_r($sub_value);
                            if (isset($sub_value[1])){
                                $min_value = $sub_value[0];
                                $max_value = $sub_value[1];
                                $ob = (float) $value['observation_value'];
                                // $ob = (float) $ob;
                                if ($ob < $min_value){
                                    $flag = 8;
                                }elseif($ob > $max_value){
                                    $flag = 7;
                                }else{
                                   $flag = 3;
                                }
                            }
                        }
                    }
                }
                else if(str_contains($strAbnormalFlag,"032")){//Normality Min L
                    $flag = 1;
                }else if(str_contains($strAbnormalFlag,"033")){//Normality Max M
                    $flag = 2;
                }else if(str_contains($strAbnormalFlag,"034")){//Panic Min PL
                    $flag = 4;
                }else if(str_contains($strAbnormalFlag,"035")){//Panic max PH
                    $flag = 5;
                }
                else if(str_contains($strAbnormalFlag,"029")){
                  $flag = 6;//ERR error
                }else if(str_contains($strAbnormalFlag,"030")){
                  $flag = 7;//DH Detection limit high
                }
                else if(str_contains($strAbnormalFlag,"031")){
                  $flag = 8;//DL Detection limit low
                }
                else if($strAbnormalFlag===""){
                  $flag = 0;
                }else{
                  $flag = 9;//WN warnning
                }
                # code....
				Log::info('BA400 flag data is',[$flag]);
                $labResult = LabOrderDetail::where('id_lab_order_detail', $value['id'])->first();
                if($labResult->lab_result != "-"){
                    $u = LabOrderDetail::where('id_lab_order_detail','=', $value['id'])->update([
                        "status" => $status,
                        //"lab_result" => $value['observation_value'],
                        "lab_result_repeat" => $value['observation_value'],
                        //"normal_range" => $value['reference_range'],
                        "result_flag" => $flag,
                        "report_date" => Carbon::now("Asia/Bangkok"),
                        //"report_id_user" => 1 ,
                        "repeat_flag" => 2,
                        "transfer_date" => Carbon::now('Asia/Bangkok'),
                        "analyzer_id" => $analyzer_id
                    ]);
                }else{
                    $u = LabOrderDetail::where('id_lab_order_detail','=', $value['id'])->update([
                        "status" => $status,
                        "lab_result" => $value['observation_value'],
                        //"normal_range" => $value['reference_range'],
                        "result_flag" => $flag,
                        "report_date" => Carbon::now("Asia/Bangkok"),
                        //"report_id_user" => 1 ,
                        "repeat_flag" => 2,
                        "transfer_date" => Carbon::now('Asia/Bangkok'),
                        "analyzer_id" => $analyzer_id
                    ]);
                    /**
                     * ########################
                     * insert to history table
                     * ########################
                     */
                    $_data = LabOrderDetail::with('order')->where('id_lab_order_detail',$value['id'])->first();
                    LabHistory::insert([
                        "lab_detail_id" => $_data['id_lab_order_detail'],
                        "lab_approve" => $value['observation_value'],
                        "patient_id" =>   $_data['order']['id_patient'],
                        "user_approve" => 1,
                        "item_id" => $_data['id_lab_item'],
                        "repeat" => 0,
                        "created_at" => Carbon::now('Asia/Bangkok'),
                        "updated_at" => Carbon::now('Asia/Bangkok'),
                        "analyzer_id" => $analyzer_id
                    ]);
                }

                /*$u = LabOrderDetail::where('id_lab_order_detail','=', $value['id'])->update([
                    "status" => $status,
                    //"lab_result" => $value['observation_value'],
                    "lab_result_repeat" => $value['observation_value'],
                    //"normal_range" => $value['reference_range'],
                    "result_flag" => $flag,
                    "report_date" => Carbon::now("Asia/Bangkok"),
                    "report_id_user" => 1 ,
                    "repeat_flag" => 2,
                    "transfer_date" => Carbon::now('Asia/Bangkok'),
                ]);*/
            }
            $id = LabOrderMain::where('lab_order_no' ,'=',$request->get('barcode'))->first();
            $update = LabOrderDetail::where('id_lab_order_main','=',$id->id_lab_order_main)->get();
            $hasChange = true;
            foreach ($update as $key => $value) {
                # code...
                if($value['status'] !== $status){
                    $hasChange = false;
                }
            }
            if($hasChange){
                LabOrderMain::where('lab_order_no' ,'=',$request->get('barcode'))->update([
                    "status" => 3
                ]);
            }
            return response()->json(['success'=>true,'status'=>true , 'message' => 'update order successfully']);
        }
        return response()->json(['success'=>true, 'status' => false, 'message' => 'these was has a problem.']);
    }

    /**
     * @param status
     * @return json
     */
    public function updateStatus(Request $request){
        $r = LabOrderMain::where('lab_order_no' ,'=',$request->get('barcode'))->update([
            "status" => $request->get('status'),
        ]);
        $labNo = $request->get('barcode');
        $lab = LabOrderDetail::whereHas('order', function($q)use($labNo){
            $q->where('lab_order_no', $labNo);
        })->where('status','!=',3)->update([
            "status" => $request->get('status'),
            "repeat_date" => Carbon::now('Asia/Bangkok'),
        ]);
        try{
          if($request->get('status')==2){
            LabOrderDetail::whereHas('order', function($q)use($labNo){
               $q->where('lab_order_no', $labNo);
             })->where('status','!=',3)->update([
               "process_date" => Carbon::now('Asia/Bangkok'),
             ]);
          }
        }
        catch(\Exception $e){
            // catch code
        }
        return response()->json(['success'=>true,'status'=>true , 'message' => 'update status successfully', 'data' => $lab]);
    }
    /**
     * @return json lab item
     */
    public function getOrderProfile(Request $request){
        /*$result = QcOrderMain::where('qc_order_main.stdel',0)->join('profile_qc_master','profile_qc_master.id_profile_qc','=','id_qc_profile_main')
        ->with(['labItem' => function($q){
            $q->join('lab_item_master','lab_item_master.id_lab_item','=','id_item_qc');
            $q->where('lab_item_master.stdel',0);
            $q->select([
                'id_qc_profile_order',
                'id_qc_profile_order_detail as item_id',
                'id_item_qc as qc_id',
                'lab_item_name',
                'result',
                'lab_item_unit as unit_identifier',
                'lab_normal_value as reference_range',
                DB::raw(" 'NONE' as abnormal_flag"),
                DB::raw(" 'F' as observation_result_status_code")
                ]);
        }])->get([
            'id_qc_profile_order',
            'id_qc_profile_order as id',
            'profile_name as name'
        ]);*/
        $results = ProfileQcMaster::where('profile_qc_master.stdel',0)
            ->with(['profileItem' => function($q){
                $q->join('lab_item_master','lab_item_master.id_lab_item','=','id_item_qc');
                //$q->where('lab_item_master.stdel',0);
                $q->select([
                    'id_profile_qc_main',
                    'id_qc_profile_detail as item_id',
                    'id_item_qc as qc_id',
                    'lab_item_name',
                    //'result',
                    'lab_item_unit as unit_identifier',
                    'lab_normal_value as reference_range',
                    DB::raw(" 'NONE' as abnormal_flag"),
                    DB::raw(" 'F' as observation_result_status_code")
                    ]);
            }])->get([
            'id_profile_qc',
            'id_profile_qc as id',
            'profile_name as name'
        ]);
        return response()->json(['success'=>true,'status'=>true,'qc_profile' =>  $results]);
    }

    /**
     * @param Request
     */
    public function updateQcOrder(Request $request){
        $analyzer_name = "BA200";
        $analyzer_id = 2;
        if($request->get('analyzer_name')!=null){
          $analyzer_name = $request->get('analyzer_name');
          $analyzerList = AnalyzerType::where('analyzer_name',$analyzer_name)->get()->toArray();
          $analyzer_id = $analyzerList[0]['id_analyzer'];
        }
        foreach($request->get('qc_specimen') as $key=>$qc){
            $result = QcOrderMain::create([
                'id_qc_profile_main' => $qc['id'],
                'qc_test_date' => Carbon::now('Asia/Bangkok'),
                'qc_test_time' => Carbon::now('Asia/Bangkok'),
                'id_user_qc' => 1,
                'id_username' => 1,
            ]);

            foreach($qc['lab_item'] as $key => $val) {
                if($val['result'] != '-'){
                    $itemCheck = ProfileQcItemDetail::where('id_profile_qc_main',$qc['id'])
                        ->where('id_item_qc', $val['qc_id'])->get();
                    if(count($itemCheck) > 0){
                        QcOrderDetail::insert([
                            'id_qc_profile_order' => $result['id'],
                            'id_item_qc' => $val['qc_id'],
                            'result' => $val['result'],
                            //'comment' => $val['comment'],
                            'id_username' => 1, //fix post data by admin
                            'analyzer' => 1,     //1 is machine 0 is keyin
                            'analyzer_id' => $analyzer_id
                        ]);
                    }
                }else{
                    $itemCheck = ProfileQcItemDetail::where('id_profile_qc_main',$qc['id'])
                        ->where('id_item_qc', $val['qc_id'])->get();
                    if(count($itemCheck) > 0){
                        QcOrderDetail::insert([
                            'id_qc_profile_order' => $result['id'],
                            'id_item_qc' => $val['qc_id'],
                            'id_username' => 1, //fix post data by admin
                            'analyzer' => 1,     //1 is machine 0 is keyin
                            'analyzer_id'=> $analyzer_id
                        ]);
                    }
                }
            }
        }
        return response()->json(['success'=>true,'status'=>true]);
    }
}
