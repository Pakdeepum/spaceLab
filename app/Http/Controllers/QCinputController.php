<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VQCProfileDetail;
use App\VQcProfile;
use App\QcOrderMain;
use App\LabItemMaster;
use App\ProfileQcItemDetail;
use App\QcOrderDetail;
use App\VQcViewData;
use PDF;
use Log;
use DB;
class QCinputController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('QC.QC-input.QC-input',$data);
    }

    public function dataprofile(int $id)
    {
        $item = VQCProfileDetail::select('id_item_qc')->where('id_profile_qc',$id)->get()->toArray();
        
        foreach($item as $key => $val) {
            $itemqc[] = $val['id_item_qc'];
        }
        \Log::info('last id item qc ', [$itemqc]);
        $time = date_default_timezone_set("Asia/Bangkok");
        $datenow['date'] = date('Y-m-d');
        $timenow['time'] = date('H:i:s');
        $datauser['user'] = session('user');
        $data = QcOrderMain::insertGetId([
            'id_qc_profile_main' => $id,
            'qc_test_date' => $datenow['date'],
            'qc_test_time' => $timenow['time'],
            'id_user_qc' => $datauser['user']['id_user']
        ]);
        foreach($itemqc as $kr => $vr) {
            QcOrderDetail::insert([
                'id_qc_profile_order' => $data,
                'id_item_qc' => $vr,
                'result' => '',
                'comment' => '',
                'id_username' =>  $datauser['user']['id_user']
            ]);
        }
        \Log::info('last id ', [$data]);
        return $this->listuserProfile($id);
    }

    public function listall(int $id)
    {
        $time = date_default_timezone_set("Asia/Bangkok");
        $datenow['date'] = date('Y-m-d');
        $timenow['time'] = date('H:i:s');
        return $this->listuserProfile($id);
    }

    public function deleteProfile(int $id)
    {
       $Dataquery = QcOrderMain::where('id_qc_profile_order',$id)->delete();
       if($Dataquery){
           $result = 1;
       }else{
           $result = 0;
       }
       return $result;
    }

    public function listItem(int $id_scope,int $id_main)
    {
        \Log::info('ids', [$id_scope, $id_main]);
        $datauser = session('user');
        $dataProfile = ProfileQcItemDetail::select('id_item_qc','mean','sd')
        ->where('id_profile_qc_main',$id_scope)->where('isReject',0)->orderBy('id_item_qc', 'ASC')
        ->get()->toArray();
        $newItem = [];
        foreach($dataProfile as $key => $val) {
            $newItem[] = $val['id_item_qc'];
        }

        $item = LabItemMaster::select('id_lab_item','lab_item_name','lab_item_unit','_decimal')
        ->where('id_hospital',$datauser['id_hospital'])
        ->whereIn('id_lab_item',$newItem)->orderBy('id_lab_item', 'ASC')
        ->get()->toArray();

        $dataallItem = [];
        foreach($item as $kk => $vv) {
            $dataallItem[] = array_merge($vv,$dataProfile[$kk]);
        }

        $allResult = QcOrderDetail::select('id_item_qc','result','comment')
        ->where('id_qc_profile_order',$id_main)->where('isReject',0)->orderBy('id_item_qc', 'ASC')->groupBy('id_item_qc')
        ->get()->toArray();
        Log::Debug('$allResult2ss:',[count($allResult)]);
        Log::Debug('$dataallItem2ss:',[count($dataallItem)]);
        if($allResult != []) {
            $newResult=[];
            foreach($allResult as $kr => $vr) {
               foreach($dataallItem as $krs => $vrs){
                    if($vr['id_item_qc'] == $dataallItem[$krs]['id_item_qc']){
                        Log::Debug('$data:',[$vr['id_item_qc'], $dataallItem[$krs]['id_item_qc']]);
                        $newResult[] = array_merge($vr,$dataallItem[$krs]);
                    }
               }
            }
            $data = json_encode(array('data'=>$newResult),JSON_UNESCAPED_UNICODE);
            Log::Debug('$data:',[$data]);
            return $data;
        }
        // else{
        //     $result['result'] = 0;
        //     $comment['comment'] = "";
        //     $NewResult = [];
        //     foreach($dataallItem as $ki => $vi) {
        //         $NewResult[] = array_merge($vi,$result,$comment);
        //     }
        //     $data = json_encode(array('data'=>$NewResult),JSON_UNESCAPED_UNICODE);
        //     return $data;
        // }
    }

    public function AddItemList(Request $request)
    {
        
        //return response()->json($request);
        $datauser = session('user');
        $request = $request->all();
        Log::Debug('Request',[$request]);
        $idprofile = $request['idprofile'];
        if (isset($request['iditem']) && isset($request['allResult']) && isset($request['textComment'])){
            $IdallItem = $request['iditem'];
            $result = $request['allResult'];
            $textComment = $request['textComment'];
        }else{
            $IdallItem = [];
            $result = [];
            $textComment = [];
            // $X = [];
            // $allResult = QcOrderDetail::select('id_item_qc')
            // ->where('id_qc_profile_order',$idprofile)->where('isReject',0)->orderBy('id_item_qc', 'ASC')->groupBy('id_item_qc')
            // ->get()->toArray();
            // foreach($allResult as $key => $value) {
            //     array_push($X,$value["id_item_qc"]);
            // }
            // print_r($X);
        }
        $idProfileQC = $request['idProfile'];
        if(isset($request['idRejectItem'])){
            $rejectItem = $request['idRejectItem'];
            Log::Debug('AddItemList:Re',[$rejectItem]);
        }else{
            $rejectItem = [];
        }
        $selectISExist = QcOrderDetail::select('*')->where('id_qc_profile_order',$idprofile)->exists();
        foreach($IdallItem as $key => $val) {
          //if exist then update else insert
            if($selectISExist){
                Log::Debug('Exist called',[$selectISExist]);
                // if(in_array($val,$rejectItem)){
                //     Log::Debug('Exist reject called',[$rejectItem]);
                //     $dataReject = ProfileQcItemDetail::where('id_profile_qc_main',$idProfileQC)->where('id_item_qc', $rejectItem)->update([
                //         'isReject' =>  1
                //     ]);
                //     $dataReject2 = DB::table('qc_order_detail')->where('id_qc_profile_order',$idprofile)->where('id_item_qc',$rejectItem)->update([
                //         'isReject'=> 1
                //     ]);
                    
                // }else
                 if(isset($result[$key])){
                Log::Debug('Exist update called',[$result[$key], $val, $idprofile]);
                $updateQc = DB::table('qc_order_detail')->where('id_qc_profile_order',$idprofile)->where('id_item_qc',$val)->update([
                    'result' => $result[$key],
                    'comment' => $textComment[$key],
                    'id_username' =>  $datauser['id_user']
                ]);
                Log::Debug('Exist update finished',[$updateQc]);
                }
            }else{
                if(in_array($val,$rejectItem)){
                    QcOrderDetail::insert([
                        'id_qc_profile_order' => $idprofile,
                        'id_item_qc' => $val,
                        'result' => "-",
                        'comment' => "",
                        'id_username' =>  $datauser['id_user'],
                        'isReject' => 1
                    ]);
                }else{
                    QcOrderDetail::insert([
                        'id_qc_profile_order' => $idprofile,
                        'id_item_qc' => $val,
                        'result' => $result[$key],
                        'comment' => $textComment[$key],
                        'id_username' =>  $datauser['id_user']
                    ]);
                }
           

            }

        }
        // echo 'rejectItem=>';
        // print_r($rejectItem);
        foreach($rejectItem as $key => $val) {
                Log::Debug('Exist reject called',[$rejectItem]);
                // echo $key,'<br>';
                $dataReject2 = DB::table('qc_order_detail')->where('id_qc_profile_order',$idprofile)->where('id_item_qc',$val)->update([
                    'isReject'=> 1
                ]);
                
            Log::Debug('Exist update finished',[$dataReject2]);
            }
        
        return response()->json($request);
    }

    public function listResultCM(int $id)
    {
        $allResult = QcOrderDetail::select('id_item_qc','result','comment')
        ->where('id_qc_profile_order',$id)
        ->get()->toArray();
        $newItem = [];
        foreach($allResult as $kk => $vv) {
            $newItem[] = $vv['id_item_qc'];
        }

        $datauser = session('user');
        $Allitem = LabItemMaster::select('lab_item_name')
        ->where('id_hospital',$datauser['id_hospital'])
        ->whereIn('id_lab_item',$newItem)
        ->get()->toArray();
        $newData = [];
        foreach($allResult as $key => $val) {

            $newData[] = array_merge($val,$Allitem[$key]);
        }

        $data = json_encode(array('data'=>$newData),JSON_UNESCAPED_UNICODE);
        return $data;
    }


    function listuserProfile($id) {
        $datauser['user'] = session('user');
        $dataProfile = VQcProfile::where('id_profile_qc',$id)
        ->get()->toArray();
        $Qcmain = QcOrderMain::select('*')
        ->where('id_qc_profile_main',$id)
        ->get()->toArray();
        $newarray = [];
        foreach($Qcmain as $key => $val) {
          $newarray[] = array_merge($val,$dataProfile[0],$datauser);
        }
        $data = json_encode(array('data'=>$newarray),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    function DateTimeAndUser() {
        $time = date_default_timezone_set("Asia/Bangkok");
        $datenow['date'] = date('Y-m-d');
        $timenow['time'] = date('H:i:s');
        $datauser['user'] = session('user');
        //return;
    }
    public function PrintQCLab(string $id)
    {
        $re_id = $id ;
        $split_id = explode(",", $re_id);
        $id_profile = 0;
        if(count($split_id) == 1){
            $select = VQcViewData::select('*')->where('id_qc_profile_order',$id)->get();
            Log::info('type:',[count($select->toArray())]);
            if(count($select->toArray()) === 0){
            $select = VQCProfileDetail::select('*')->where('id_profile_qc_main',$id)->get();
            Log::info('o called:',[$id, $select]);
            foreach ($select as $key => $value) {
                # code...
                Log::info('o value:',[$value]);
                $value['result'] = 0;
                $id_profile =$value['id_profile_qc'];
                $select["profile_name"] = $value['profile_name'];
                $select["qc_level"] = $value['qc_level'];
                $select["qc_name"] = $value['qc_name'];
            }
            $pdf = PDF::loadView('QC.QC-input.QcResultPDF',['detail'=>$select]);
            return @$pdf->stream();
            }

            foreach ($select as $key => $value) {
                # code...
                $value['result'] = number_format((float)$value['result'],(float)$value['result_decimal']);
                $id_profile =$value['id_qc_profile'];
            }
            $profileData = VQCProfile::select('*')->where('id_profile_qc',$id_profile)->get();
            foreach ($profileData as $key => $value) {
            $select["profile_name"] = $value['profile_name'];
            $select["qc_level"] = $value['qc_level'];
            $select["qc_name"] = $value['qc_name'];
            }
            // print_r($select);
            Log::info('listAll id:',[$select->toArray()]);
            // print_r($select);
            $pdf = PDF::loadView('QC.QC-input.QcResultPDF',['detail'=>$select]);
            // $pdf = PDF::loadView('QC.QC-input.QcResultPDF',['detail'=>$select]);
            return @$pdf->stream();
        }else{
            foreach ($split_id as $key => $value){
                $select = VQcViewData::select('*')->where('id_qc_profile_order',$id)->get();
                Log::info('type:',[count($select->toArray())]);
                if(count($select->toArray()) === 0){
                    $select = VQCProfileDetail::select('*')->where('id_profile_qc_main',$id)->get();
                    Log::info('o called:',[$id, $select]);
                    foreach ($select as $key => $value) {
                        # code...
                        Log::info('o value:',[$value]);
                        $value['result'] = 0;
                        $id_profile =$value['id_profile_qc'];
                        $select["profile_name"] = $value['profile_name'];
                        $select["qc_level"] = $value['qc_level'];
                        $select["qc_name"] = $value['qc_name'];
                    }
                    $pdf = PDF::loadView('QC.QC-input.QcResultPDF',['detail'=>$select]);
                    return @$pdf->stream();
                }
                // echo $key.'<br>';
                $status = false;
                if ($key>=1){
                    $status = true;
                }
                foreach ($select as $key => $value) {
                    # code...
                    if ($status){
                        $data_result = number_format((float)$value['result'],(float)$value['result_decimal']);
                        if ($data_result != 0){
                            $value['result'] = number_format((float)$value['result'],(float)$value['result_decimal']);
                        }
                    }else{
                        $value['result'] = number_format((float)$value['result'],(float)$value['result_decimal']);
                    }
                    $id_profile =$value['id_qc_profile'];
                }
                $profileData = VQCProfile::select('*')->where('id_profile_qc',$id_profile)->get();
                foreach ($profileData as $key => $value) {
                    $select["profile_name"] = $value['profile_name'];
                    $select["qc_level"] = $value['qc_level'];
                    $select["qc_name"] = $value['qc_name'];
                }
                Log::info('listAll id:',[$select->toArray()]);
            }
            $pdf = PDF::loadView('QC.QC-input.QcResultPDF',['detail'=>$select]);
            return @$pdf->stream();
        }
    }
    
}
