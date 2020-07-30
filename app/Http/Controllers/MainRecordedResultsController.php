<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VLabOrderMain;
use App\VLabOrderDetail;
use App\LabOrderDetail;
use App\LabOrderMain;
use App\LabOrderItem;
use App\LabSubGroupItemMaster;
use App\LabItemMaster;
use App\AppointmentOrderData;
use App\Cancel;
use Carbon\Carbon;
use App\LabHistory;
use App\Critical;
use App\UserMaster;
use App\DistrictMaster;
use App\AmphurMaster;
use App\PrefixMaster;
use App\ProvinceMaster;
use App\PatientMaster;
use JasperPHP\JasperPHP;
use PDF;
use DB;
use File;
use Log;
use Maatwebsite\Excel\Facades\Excel;
class MainRecordedResultsController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $user = session('user');
        $data['user']=$user;
        $data['listmenu'] = $listmenu;
        \Log::debug($data);
        return view('main.recorded-results.recorded-results',$data);
    }

    public function DataRecordedResults()
    {
        $labResult = LabOrderMain::orderBy('id_lab_order_main', 'DESC')->with(['patient' => function($q){
            $q->with('prefix');
            $q->with('prefix');
        }])->with('detail')->where('stdel',0)->get();
        
        // foreach ($labResult as $key => $value) {
        //     # code...
        //     $value['order_date'] = Carbon::parse($value['order_date'])->format('H:i:s');
        //     $dbDate = \Carbon\Carbon::parse($value->patient['birthday']);
        //     $value->patient['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
        // }
        // $labResult = LabOrderMain::orderBy('id_lab_order_main', 'DESC')->get();
        $labResult->toArray();
        $data = json_encode(array('data'=>$labResult),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataRedRecordedResults()
    {
        $labResult = VLabOrderDetail::orderBy('id_lab_order_main', 'DESC')->where('stdel',0)->where('reported',1)->where(function($q) {
            $q->where('result_flag', 4)
              ->orWhere('result_flag', 5);
        })->get();
        // foreach ($labResult as $key => $value) {
        //     # code...
        //     $value['order_date'] = Carbon::parse($value['order_date'])->format('H:i:s');
        //     $dbDate = \Carbon\Carbon::parse($value->patient['birthday']);
        //     $value->patient['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
        // }
        $labResult->toArray();
        $data = json_encode(array('data'=>$labResult),JSON_UNESCAPED_UNICODE);
        \Log::info('red data', [$data]);
        return $data;
    }

    public function DataPatient(int $id)
    {
        $DataPatient = VLabOrderMain::select('*')->where('stdel',0)->where('id_lab_order_main',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataPatient),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    /**
     * ###################
     * search lab result
     * ###################
     */
    public function getLabResult(Request $request)
    {
        $hn = str_replace("\"","",$request->input('resultHn'));
        $labNo = str_replace("\"","",$request->input('labResultNo'));
        $fname = $request->input('fname');

        $labResult = LabOrderMain::orderBy('id_lab_order_main', 'DESC')->with(['patient' => function($q){
            $q->with('prefix');
        }])->with('detail')->join('patient_master','patient_master.id_patient','=','lab_order_main.id_patient')
        ->join('prefix_name_master','prefix_name_master.id_prefix','=','patient_master.prefix_name')
        ->where('lab_order_main.stdel',0);

        if($request->has('resultHn')){
            $labResult->where('patient_master.hn','like', '%' .$hn. '%');
        }
        if($request->has('labResultNo') && $request->input('labResultNo') != "" ){
            $labResult->where('lab_order_no','like', '%' .$labNo. '%');
        }
        if($request->has('fname') && $request->input('fname') != ""){
            $labResult->where('patient_master.patient_firstname','like', '%' .$fname. '%')
            ->orWhere('patient_master.patient_lastname','like', '%' .$fname. '%')
            ->orWhere('prefix_name_master.prefix_name','like', '%' .$fname. '%')
            ->orWhere(DB::raw('CONCAT(prefix_name_master.prefix_name," ", patient_master.patient_firstname," ",patient_master.patient_lastname)'),'like', '%' .$fname. '%');
        }

        $labResult = $labResult->get();
        foreach ($labResult as $key => $value) {
            # code...
            $value['order_date'] = Carbon::parse($value['order_date'])->format('H:i:s');
        }
        $labResult->toArray();
        $data = json_encode(array('data'=>$labResult),JSON_UNESCAPED_UNICODE);

        return $data;
    }

    public function DataRecordedResultsByDate(string $date1, string $date2)
    {
        $newdate1 = date('d-m-Y',strtotime($date1));
        $newdate2 = date('d-m-Y',strtotime($date2));
        $DataRecordedResultsByDate = VLabOrderMain::orderBy('id_lab_order_main', 'DESC')->select('*')->where('stdel',0)->whereBetween("order_date",[$newdate1,$newdate2])->get()->toArray();
        $data = json_encode(array('data'=>$DataRecordedResultsByDate),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DataRecordedResultsByStatus(int $status)
    {
            // header('Content-Type: text/html; charset=utf-8');
        //   $labRequest = DB::connection('mysql2')->select('select * from lab_request');
        //       $i = 0;
            // $labRequest = json_encode(array('data'=>$lab_Request),JSON_UNESCAPED_UNICODE);
            // $lab_Request->toArray();
            // $labRequest = json_encode(array('data'=>$lab_Request),JSON_UNESCAPED_UNICODE);

            // print_r($labRequest[0]->lab_request_lon);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_msg_type);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_data);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_datetime);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_receive);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_receive_datetime);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_receive_data);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_hn);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_order_datetime);
            // echo "<br>";
            // print_r($labRequest[0]->lab_request_order_type);
            // echo "<br>-------------------------------------<br>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_lon . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_msg_type . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_data . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_datetime . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_receive_datetime . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_receive_data . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_hn . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_msg_type . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_order_datetime . ")</script>";
            // echo "<script>console.log('test:', " . $labRequest[0]->lab_request_order_type . ")</script>";
            


        //   foreach($labRequest as $key => $value){
        //       $requestLon[$i]               = $value->lab_request_lon;
        //       $request_msg_type[$i]         = $value->lab_request_msg_type;
        //       $request_data[$i]             = $value->lab_request_data;
        //       $request_datetime[$i]         = $value->lab_request_datetime;
        //       $request_receive[$i]          = $value->lab_request_receive;
        //       $request_receive_datetime[$i] = $value->lab_request_receive_datetime;
        //       $request_receive_data[$i]     = $value->lab_request_receive_data;
        //       $request_hn[$i]               = $value->lab_request_hn;
        //       $request_order_datetime[$i]   = $value->lab_request_order_datetime;
        //       $request_order_type[$i]       = $value->lab_request_order_type;
        //         //   echo $request_data[$i]."<br>";
        //         //   echo "<script>console.log('test:', ";
        //         //   echo $requestLon[$i];
        //         //   echo ")</script>";
        //         // echo "requestLon => ". $requestLon[0] ." || request_msg_type => ".$request_msg_type[0]." || request_datetime".$request_datetime[0];
        //         // echo "<br>";
              
        //       $checkLabOrderNo = LabOrderMain::select('lab_order_no')->where('lab_order_no',$requestLon[$i])->get()->toArray();

        //       if($checkLabOrderNo == null){
        //           $str =  iconv('TIS-620','UTF-8',$request_data[$i] );
                 
        //           $data_request[$i] = explode("|", iconv('TIS-620','UTF-8',$request_data[$i] ));
        //           $data_OBR[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR")); 
        //         //   print_r($data_request[$i]);
        //         //   echo "<br>";

        //         //   print_r($data_request[$i]);
        //         //   echo "<br>";
        //         //   echo "-------------------------------------------------------------------------";
        //         //   echo "<br>";
            
        //           if(count($data_request[$i]) > 26){
        //             //   HN 
        //             $patient_hn_hl7 = $data_request[$i][21];
        //             //  NAME PATIENT
        //             $patient_name_hl7 = $data_request[$i][23];
        //             $patient_name[$i] = explode("^", $patient_name_hl7);
        //             $patient_lastname = $patient_name[$i][0]; 
        //             $patient_firstname = $patient_name[$i][1]; 
        //             $patient_prename = $patient_name[$i][4]; 
        //             $prefix_name = 0;
        //             if(strcmp("ด.ช.",$patient_prename) == 0|| strcmp("นาย",$patient_prename) == 0 || strcmp("Mr.",$patient_prename) == 0 || strcmp("Mr",$patient_prename) == 0){
        //                     $prefix_name = 1;
        //                     $gender = 1;
        //             }
        //             if(strcmp("ด.ญ.",$patient_prename) == 0 || strcmp("นางสาว",$patient_prename) == 0 || strcmp("Miss",$patient_prename) == 0){
        //                     $prefix_name = 3;
        //                     $gender = 2;
        //             }
        //             if(strcmp("ดร.",$patient_prename) == 0 || strcmp("Dr.",$patient_prename) == 0 ){
        //                 $prefix_name = 4;
        //             }
        //             if(strcmp("นาง",$patient_prename) == 0){
        //                     $prefix_name = 2;
        //                     $gender = 2;
        //             }
                

        //             // BIRST DATE PATIENT
        //             $patient_birth_hl7 = $data_request[$i][25];
        //             $patient_birth_year = $patient_birth_hl7[0].$patient_birth_hl7[1].$patient_birth_hl7[2].$patient_birth_hl7[3];
        //             $patient_birth_month = $patient_birth_hl7[4].$patient_birth_hl7[5];
        //             $patient_birth_days = $patient_birth_hl7[6].$patient_birth_hl7[7];
        //             $patient_birth_date = $patient_birth_year.'-'.$patient_birth_month.'-'.$patient_birth_days;

        //             // ADDRESS PATIENT 
        //             $patient_address_hl7 = $data_request[$i][29];
        //             $patient_address[$i] = explode("^", $patient_address_hl7);
        //             $Patient_address = $patient_address[$i][0];

        //             $Patient_subDistrict = $patient_address[$i][1];
        //             // print_r($Patient_subDistrict);
        //             // echo '|';
        //             if($Patient_subDistrict != null && $Patient_subDistrict!='Room'){
        //                 $district = DistrictMaster::where('district_name','like', '%' .$Patient_subDistrict.'%')
        //                             ->orWhere('district_name_en','like', '%' .$Patient_subDistrict.'%')
        //                             ->first()
        //                             ->toArray();
        //                 $district_id =  $district['district_id'];
        //                 $district_id = null; 
        //             }else{
        //                 $district_id = null; 
        //             }
        //             // // \Log::debug($district_id); 

        //             $Patient_District = $patient_address[$i][2];
        //             if($Patient_District != null && $Patient_District!='Bed'){
        //                 $aumphur  = AmphurMaster::where('amphur_name','like', '%' .$Patient_District.'%')
        //                             ->orWhere('amphur_name_en','like', '%' .$Patient_District.'%')
        //                             ->first()
        //                             ->toArray();
        //                 $aumphur_id = $aumphur['amphur_id'];
        //             }else{
        //                 $aumphur_id = null; 
        //             }
        //                 // \Log::info($aumphur_id); 
        //                 // print_r( $patient_address[$i][3]);

        //             $count = count($patient_address[$i]);
        //             if ($count >= 5){
        //                 $Patient_Province = $patient_address[$i][3];

        //             if($Patient_Province != null){
        //                 $province  = ProvinceMaster::where('province_name','like', '%' .$Patient_Province.'%')
        //                             ->orWhere('province_name_en','like', '%' .$Patient_Province.'%')
        //                             ->first()
        //                             ->toArray();
        //                 $province_id = $province['province_id'];
        //             }else{
        //                 $province_id = null; 
        //             }

        //             }
                

                    
        //             // \Log::info($province_id); 
        //             // \Log::info($province['province_name']); 


        //             $Patient_Zipcode = null;
        //             if(count($patient_address[$i]) > 4){
        //                 $Patient_Zipcode = $patient_address[$i][4];
        //             }

        //             //////insert ////////
        //             // echo "<script>console.log('insert')</script>";
        //             // echo "<script>console.log('$patient_hn_hl7')</script>";
        //             PatientMaster::insert([
        //                 "hn" => $patient_hn_hl7,
        //                 "patient_firstname" => $patient_firstname,
        //                 "patient_lastname" =>   $patient_lastname,
        //                 "prefix_name" => $prefix_name,
        //                 "birthday" => $patient_birth_date,

        //                 "patient_address" => $Patient_address,
        //                 "patient_district" => $district_id,
        //                 "patient_amphur" => $aumphur_id,
        //                 "patient_province" => $province_id,
        //                 "patient_zipcode" => $Patient_Zipcode
        //             ]);
        //           }
                 
        //         //   \Log::debug(iconv('TIS-620','UTF-8',$request_data[$i] ));    

        //           $OBR[$i] = explode("OBR", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR")); 
        //           \Log::debug(\Log::debug(iconv('TIS-620','UTF-8',$request_data[$i] )));
        //         //   \Log::debug( $OBR[$i]);
        //           // $each_OBR[$i] = explode("|",  $OBR[$i][count($OBR[$i])-1]); 
        //           $countOBR = count($OBR[$i]);
                
        //           for($k=1;$k<$countOBR ;$k++){
        //               $each_OBR[$k] = explode("|",$OBR[$i][$k]); 
        //               \Log::debug( $each_OBR[$k]);    
        //           }
                    
                      
        //           }
        //       $i++;
        //   }
        
  
          $DataRecordedResultsByStatus = LabOrderMain::orderBy('id_lab_order_main', 'DESC')
          ->with(['patient' => function($q){
              $q->with('prefix');
           }])
           ->with('detail')->where('stdel',0)->where('status',$status)->get();
          foreach ($DataRecordedResultsByStatus as $key => $value) {
              if($value->patient['birthday']!=null){
                  $dbDate = \Carbon\Carbon::parse($value->patient['birthday']);
                  $value->patient['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);;
              }
  
          }
        // $LabSubGroupItem = LabSubGroupItemMaster::select('*')->where('stdel',0)->get()->toArray();

          $DataRecordedResultsByStatus->toArray();
          $data = json_encode(array('data'=>$DataRecordedResultsByStatus),JSON_UNESCAPED_UNICODE);
          return $data;
    }

    public function DataRecordedResultsByStatusTest(int $status)
    {
            // header('Content-Type: text/html; charset=utf-8');
          $labRequest = DB::connection('mysql2')->select('select * from lab_request');
              $i = 0;

          foreach($labRequest as $key => $value){
              $requestLon[$i]               = $value->lab_request_lon;
              $request_msg_type[$i]         = $value->lab_request_msg_type;
              $request_data[$i]             = $value->lab_request_data;
              $request_datetime[$i]         = $value->lab_request_datetime;
              $request_receive[$i]          = $value->lab_request_receive;
              $request_receive_datetime[$i] = $value->lab_request_receive_datetime;
              $request_receive_data[$i]     = $value->lab_request_receive_data;
              $request_hn[$i]               = $value->lab_request_hn;
              $request_order_datetime[$i]   = $value->lab_request_order_datetime;
              $request_order_type[$i]       = $value->lab_request_order_type;

              $checkLabOrderNo = LabOrderMain::select('lab_order_no')->where('lab_order_no',$requestLon[$i])->get()->toArray();

              if($checkLabOrderNo == null){
                  $str =  iconv('TIS-620','UTF-8',$request_data[$i] );
                 
                  $data_request[$i] = explode("|", iconv('TIS-620','UTF-8',$request_data[$i] ));
                  $data_OBR[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR")); 
                  $data_PV1[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"PV1"));
                  $data_ORC[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"ORC"));
                //   echo "data_request --> ";
                //   print_r($data_request[$i]);
                //   echo "<br><br>data_OBR --> ";
                //   print_r($data_OBR[$i]);
                //   echo "<br><br>data_PV1 --> ";
                //   print_r($data_request[$i]);
                //   echo "<br> PV1 --> ";
                //   print_r($data_PV1[$i]);
                //   echo "<br> ORC --> ";
                //   print_r($data_ORC[$i]);

            
                  if(count($data_request[$i]) > 26){
                    //   HN 
                    $patient_hn_hl7 = $data_request[$i][21];
                    //  NAME PATIENT
                    $patient_name_hl7 = $data_request[$i][23];
                    $patient_name[$i] = explode("^", $patient_name_hl7);
                    $patient_lastname = $patient_name[$i][0]; 
                    $patient_firstname = $patient_name[$i][1]; 
                    $patient_prename = $patient_name[$i][4]; 
                    $prefix_name = 0;
                    if(strcmp("ด.ช.",$patient_prename) == 0|| strcmp("นาย",$patient_prename) == 0 || strcmp("Mr.",$patient_prename) == 0 || strcmp("Mr",$patient_prename) == 0){
                            $prefix_name = 1;
                            $gender = 1;
                    }
                    if(strcmp("ด.ญ.",$patient_prename) == 0 || strcmp("นางสาว",$patient_prename) == 0 || strcmp("Miss",$patient_prename) == 0){
                            $prefix_name = 3;
                            $gender = 2;
                    }
                    if(strcmp("ดร.",$patient_prename) == 0 || strcmp("Dr.",$patient_prename) == 0 ){
                        $prefix_name = 4;
                    }
                    if(strcmp("นาง",$patient_prename) == 0){
                            $prefix_name = 2;
                            $gender = 2;
                    }
                

                    // BIRST DATE PATIENT
                    $patient_birth_hl7 = $data_request[$i][25];
                    $patient_birth_year = $patient_birth_hl7[0].$patient_birth_hl7[1].$patient_birth_hl7[2].$patient_birth_hl7[3];
                    $patient_birth_month = $patient_birth_hl7[4].$patient_birth_hl7[5];
                    $patient_birth_days = $patient_birth_hl7[6].$patient_birth_hl7[7];
                    $patient_birth_date = $patient_birth_year.'-'.$patient_birth_month.'-'.$patient_birth_days;

                    // ADDRESS PATIENT 
                    $patient_address_hl7 = $data_request[$i][29];
                    $patient_address[$i] = explode("^", $patient_address_hl7);
                    $Patient_address = $patient_address[$i][0];

                    $Patient_subDistrict = $patient_address[$i][1];
                    if($Patient_subDistrict != null){
                        $district = DistrictMaster::where('district_name','like', '%' .$Patient_subDistrict.'%')
                                    ->orWhere('district_name_en','like', '%' .$Patient_subDistrict.'%')
                                    ->first()
                                    ->toArray();
                        $district_id =  $district['district_id'];
                    }else{
                        $district_id = null; 
                    }
                    // \Log::debug($district_id); 
                   

                    $Patient_District = $patient_address[$i][2];
                    if($Patient_District != null){
                        $aumphur  = AmphurMaster::where('amphur_name','like', '%' .$Patient_District.'%')
                                    ->orWhere('amphur_name_en','like', '%' .$Patient_District.'%')
                                    ->first()
                                    ->toArray();
                        $aumphur_id = $aumphur['amphur_id'];
                    }else{
                        $aumphur_id = null; 
                    }
                        // \Log::info($aumphur_id); 

                    $Patient_Province = $patient_address[$i][3];
                    if($Patient_Province != null){
                        $province  = ProvinceMaster::where('province_name','like', '%' .$Patient_Province.'%')
                                    ->orWhere('province_name_en','like', '%' .$Patient_Province.'%')
                                    ->first()
                                    ->toArray();
                        $province_id = $province['province_id'];
                    }else{
                        $province_id = null; 
                    }
                    // \Log::info($province_id); 
                    // \Log::info($province['province_name']); 


                    $Patient_Zipcode = null;
                    if(count($patient_address[$i]) > 4){
                        $Patient_Zipcode = $patient_address[$i][4];
                    }
                    ////////insert ////////
                    //  echo "<script>console.log('insert')</script>";
                    // PatientMaster::insert([
                    //     "hn" => $patient_hn_hl7,
                    //     "patient_firstname" => $patient_firstname,
                    //     "patient_lastname" =>   $patient_lastname,
                    //     "prefix_name" => $prefix_name,
                    //     "birthday" => $patient_birth_date,

                    //     "patient_address" => $Patient_address,
                    //     "patient_district" => $district_id,
                    //     "patient_amphur" => $aumphur_id,
                    //     "patient_province" => $province_id,
                    //     "patient_zipcode" => $Patient_Zipcode
                    // ]);

                    // echo "insert table PatientMaster <br>";
                    // echo "hn => $patient_hn_hl7 <br>";
                    // echo "patient_firstname => $patient_firstname <br>";
                    // echo "patient_lastname =>   $patient_lastname <br>";
                    // echo "prefix_name => $prefix_name <br>";
                    // echo "birthday => $patient_birth_date <br>";
                    // echo "patient_address => $Patient_address <br>";
                    // echo "patient_district => $district_id <br>";
                    // echo "patient_amphur => $aumphur_id <br>";
                    // echo "patient_province => $province_id <br>";
                    // echo "patient_zipcode => $Patient_Zipcode <br>";
                    // echo "----------------------<br>";


                    echo "<br><br>PV1<br> 2) ".$data_PV1[$i][2]." => table -> patient_master | colum -> patient_type | PR -> patient_type";
                    echo "<br> 3) Assigned Patient Location -> ตำแหน่งของผู้ป่วยที่ได้รับมอบหมาย => ".$data_PV1[$i][3];
                    $APLocation[$i] = explode("^", $data_PV1[$i][3]);
                    echo "<br>  3.1) PointOfCare => ".$APLocation[$i][0];
                    echo "<br>  3.2) Room => ".$APLocation[$i][1];

                    echo "<br> 5) Preadmit Number => ".$data_PV1[$i][5];
                    echo "<br> 7) Attending Doctor => ".$data_PV1[$i][7];
                    $AtDoctor[$i] = explode("^", $data_PV1[$i][7]);
                    echo "<br>  7.1) ID => ".$AtDoctor[$i][0];
                    echo "<br>  7.2) Name => ".$AtDoctor[$i][1];

                    echo "<br> 10) Hospital Service ".$data_PV1[$i][10]."lab_order_main -> id_sevice_plan";
                    echo "<br> 11) Temporary Location ตำแหน่งชั่วคราว".$data_PV1[$i][11];
                    $TemLocation[$i] = explode("^", $data_PV1[$i][11]);
                    echo "<br>  11.1) ID ".$TemLocation[$i][0];
                    echo "<br>  11.2) Name".$TemLocation[$i][1];

                    echo "<br> 17) Admitting Doctor => ".$data_PV1[$i][17];
                    $AdDoctor[$i] = explode("^", $data_PV1[$i][17]);
                    echo "<br>  17.1) ID ".$AdDoctor[$i][0];
                    echo "<br>  17.2) FamilyName => " .$AdDoctor[$i][1];

                    // echo "<br> 18)".$data_PV1[$i][18]." => Patient type . => table -> patient_master | colum -> patient_type | PR -> patient_type";
                    echo "<br> 19)".$data_PV1[$i][19]." => Visit Number หมายเลขผู้มาเยี่ยม*";
                    echo "<br> 44)".$data_PV1[$i][44]." => Admit Date/Time วันที่เข้า";
                    echo "<br> 45)".$data_PV1[$i][45]." => Discharge Date/Time วันที่ออก";


                    echo "<br><br>ORC<br> 1) ".$data_ORC[$i][1]." => Order Control สถานะการสั่งแล็บ";
                    echo "<br> 2) ".$data_ORC[$i][2]." => Placer Order Number ผู้สั่งซื้อ";
                    echo "<br> 2) ".$data_ORC[$i][3]." => Filler Order Number ผู้สั่งซื้อ";
                    echo "<br> 2) ".$data_ORC[$i][9]." => Date/Time of Transaction เวลาการทำธุรกรรม";
                    echo "<br> 12) ".$data_ORC[$i][12]." => Ordering Provider ผู้ให้บริการการสั่งซื้อ";
                    echo "<br> 17) ".$data_ORC[$i][17]." => Order Computername";
                    echo "<br> 18) ".$data_ORC[$i][18]." => Receive Computername คอมพิวเตอร์";



                    echo "<br>---------------------------<br><br>";

                  }
                 
                //   \Log::debug(iconv('TIS-620','UTF-8',$request_data[$i] ));    

                  $OBR[$i] = explode("OBR", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR")); 
                  \Log::debug(\Log::debug(iconv('TIS-620','UTF-8',$request_data[$i] )));
                //   \Log::debug( $OBR[$i]);
                  // $each_OBR[$i] = explode("|",  $OBR[$i][count($OBR[$i])-1]); 
                  $countOBR = count($OBR[$i]);
                
                  for($k=1;$k<$countOBR ;$k++){
                      $each_OBR[$k] = explode("|",$OBR[$i][$k]); 
                      \Log::debug( $each_OBR[$k]);    
                  }
                    
                      
                  }
              $i++;
          }
        
  
        //   $DataRecordedResultsByStatus = LabOrderMain::orderBy('id_lab_order_main', 'DESC')
        //   ->with(['patient' => function($q){
        //       $q->with('prefix');
        //    }])
        //    ->with('detail')->where('stdel',0)->where('status',$status)->get();
        //   foreach ($DataRecordedResultsByStatus as $key => $value) {
        //       if($value->patient['birthday']!=null){
        //           $dbDate = \Carbon\Carbon::parse($value->patient['birthday']);
        //           $value->patient['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);;
        //       }
  
        //   }
        //   $DataRecordedResultsByStatus->toArray();
        //   $data = json_encode(array('data'=>$DataRecordedResultsByStatus),JSON_UNESCAPED_UNICODE);
        //   return $data;
    }

    public function DataLabDetail(int $id)
    {
        $labDetail = LabOrderDetail::leftJoin('lab_item_master','lab_item_master.id_lab_item','=','lab_order_detail.id_lab_item')
        ->select('lab_order_detail.*','lab_item_master.*','lab_order_detail.status AS status')
        ->with(['order' => function($q){
            $q->with('patient');
        }])->with(['roles' => function($q){
            $q->with('prefixName');
        }])->with(['rolesEdit' => function($q){
            $q->with('prefixName');
        }])->with(['approve' => function($q){
            $q->with('prefixName');
        }])->with(['editApprove' => function($q){
            $q->with('prefixName');
        }])->where('id_lab_order_main',$id)->where('lab_order_detail.stdel',0)->orderBy('ordered')->get();     
//echo "<script>console.log('test');</script>";
        foreach ($labDetail as $key => $value) {
            # code...
            $dbDate = \Carbon\Carbon::parse($value->order['patient']['birthday']);
            $value->order['patient']['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
            /*if($value->rolesEdit!=null){// if result lab item is edit
              $value->roles['fname'] = $value->rolesEdit['fname'];
              $value->roles['lastname'] = $value->rolesEdit['lastname'];
              $value->roles['prefix_name'] =$value->rolesEdit['prefix_name'];
            }else{
              $value->roles['fname'] = $value->roles['fname'];
              $value->roles['lastname'] = $value->roles['lastname'];
              $value->roles['prefix_name'] =$value->roles['prefix_name'];
            }*/
        }

        $labDetail->toArray();
        $data = json_encode(array('data'=>$labDetail),JSON_UNESCAPED_UNICODE);
        \Log::info('result data', [$data]);
        return $data;
    }

    public function appointmentMaxValue(int $id)
    {
        $appoint = AppointmentOrderData::with('labOrderMain')->with(['doctor' => function($q){
            $q->with('prefix')->with('hospital')->with('specialty')->with('department');
        }])->where('id_lab_order_main',$id)->orderBy('id_appointment','DESC')->limit(1)->get();

        $appoint->toArray();
        $data = json_encode(array('data'=>$appoint),JSON_UNESCAPED_UNICODE);

        return $data;
    }

    /*public function UpdateResult(int $id, int $idmain, string $resultlab,
        int $statusdetail, string $normalvalue, string $repeatflag) {
        $normal;
        if(strstr($normalvalue,':')) {
            $d = explode(" ",$normalvalue);
            $normal = $d[1];
        }else{
            $normal = $normalvalue;
        }
        $front = strstr($normal,'-',true);
        $b = strstr($normal,'-');
        $back = substr($b,1);

        $Check;

        if($CheckRange1 = str_split($normal)){
            if($CheckRange1[0] == '<'){
                $CheckRange2 = explode("<",$normal);
                if($resultlab <= $CheckRange2[1]){
                    $Check = 2;
                } else{
                    $Check = 3;
                }
            }else if($CheckRange1[0] == '>'){
                $CheckRange2 = explode(">",$normal);
                if($resultlab >= $CheckRange2[1]){
                    $Check = 2;
                }
                else{
                    $Check = 1;
                }
            }else if($front != ""){
                if($resultlab < $front){
                    $Check = 1;
                }
                else if($resultlab >= $front && $resultlab <= $back){
                    $Check = 2;
                }
                else{
                    $Check = 3;
                }
            }else{
                if(is_numeric($normal)){
                    if($resultlab < $normal){
                        $Check = 1;
                    }
                    else if($resultlab > $normal){
                        $Check = 3;
                    }
                    else{
                        $Check = 2;
                    }
                }
                else{
                    $Check = 0;
                }
            }
        }
        $user = session('user')->toArray();
        $userID = $user['id_user'];
        $timestamp = Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s');
        if($repeatflag == 0){
            if($statusdetail != 4){
                if($resultlab != "-"){
                    $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                        'report_id_user'=>$userID,
                        'status'=>3,
                        'lab_result'=>$resultlab,
                        'normal_range'=>$normal,
                        'result_flag'=>$Check,
                        'report_date'=>$timestamp
                    ]);
                }
                else if($resultlab == "-"){
                    $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                        'status'=>2
                    ]);
                }
            }else{
                $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                    'report_id_user'=>$userID,
                    'lab_result'=>$resultlab,
                    'normal_range'=>$normal,
                    'result_flag'=>$Check,
                    'report_date'=>$timestamp
                ]);
            }
        }else{
            if($statusdetail != 4){
                if($resultlab != "-"){
                    $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                        'report_id_user'=>$userID,
                        'status'=>3,
                        'lab_result_repeat'=>$resultlab,
                        'normal_range'=>$normal,
                        'result_flag'=>$Check,
                        'report_date'=>$timestamp
                    ]);
                } else if($resultlab == "-"){
                    $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                        'status'=>2
                    ]);
                }
            }else{
            $data = LabOrderDetail::where('id_lab_order_detail',$id)->update([
                    'report_id_user'=>$userID,
                    'lab_result_repeat'=>$resultlab,
                    'normal_range'=>$normal,
                    'result_flag'=>$Check,
                    'report_date'=>$timestamp
                ]);
            }
        }

        if($data){
            $result = 1;
        } else {
            $result = 0;
        }

        $Select = LabOrderDetail::select('status')->where('id_lab_order_main',$idmain)->orderBy('status')->get()->toArray();
        $status = $Select[0]['status'];

        $data = LabOrderMain::where('id_lab_order_main',$idmain)->update([
            'status'=>$status
        ]);

        /**
         * ########################
         * insert to history table
         * ########################
         */
        /*$_data = LabOrderDetail::with('order')->where('id_lab_order_detail',$id)->first();
        LabHistory::insert([
            "lab_detail_id" => $_data['id_lab_order_detail'],
            "lab_approve" => $resultlab,
            "patient_id" =>   $_data['order']['id_patient'],
            "user_approve" => $userID,
            "item_id" => $_data['id_lab_item'],
            "created_at" => Carbon::now('Asia/Bangkok'),
            "updated_at" => Carbon::now('Asia/Bangkok')
        ]);
        return $result;
        }*/

    public function updateResult(Request $request) {//reported process
	 Log::info('Aommy process in');
        if($request->has('edit')&&$request->get('edit')!=null){
            /**update lab result with authentication */
            // echo '<script>console.log("test echo")</script>';
            foreach ($request->get('data') as $key => $value) {
                # code...
				 Log::info('updateResult  $critical_value',[$value['critical_value']]);

                $pos = strrpos($value['normal_range'], "-");
                $statusLab = 0;
				  try{
                  $critical_range = strrpos($value['critical_value'], ",")||strrpos($value['critical_value'], "-");
                }
                catch(\Exception $e){
                    // catch code
                }
                if($pos){
                    $normal = explode('-',$value['normal_range']);
                    if($value['lab_result'] < $normal[0]){
                        $statusLab = 1;
                    }
                    if($value['lab_result'] > $normal[1]){
                        $statusLab = 2;
                    }
                    if($value['lab_result'] > $normal[0] && $value['lab_result'] < $normal[1]){
                        $statusLab = 3;
                    }
                    $mean = $normal[1]-$normal[0];
                    $mean = $mean/2;
                    if($value['lab_result']<$normal[0]-$mean){
                        //$statusLab = 4;
                    }else if($value['lab_result']>$normal[1]+$mean){
                        //$statusLab = 5;
                    }
                }
				    Log::info('updateResult  $normal',[ $critical_range]);
				 if($critical_range){
                  try{
                    $critical = explode(',',$value['critical_value']);
                    //$critical =preg_split( "/ (,|-) /", $value['critical_value']);
                    if($value['lab_result'] < $critical[0]){
                      $statusLab = 4;
                    }else if($value['lab_result'] > $critical[1]){
                        $statusLab = 5;
                    }
                  }catch(\Exception $e){
                    // catch code
                  }
                  try{
                    $critical = explode('-',$value['critical_value']);
                    //$critical =preg_split( "/ (,|-) /", $value['critical_value']);
                    if($value['lab_result'] < $critical[0]){
                      $statusLab = 4;
                    }else if($value['lab_result'] > $critical[1]){
                        $statusLab = 5;
                    }
                  }catch(\Exception $e){
                    // catch code
                  }
                }
                    if($value['lab_result']!=null && $value['lab_result'] != "-"){
                        $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])
                        ->where('lab_result','!=',$value['lab_result'])//not edit same value
                        ->update([
                            'lab_result'=> $value['lab_result'],
                            'normal_range'=>$value['normal_range'],
							'result_flag'=>$statusLab,
                            'edit_date' => Carbon::now('Asia/Bangkok'),
                            'edit_id_user' => $request->get('edit')['id_user']
                        ]);

                        $_data = LabOrderDetail::with('order')->where('id_lab_order_detail',$value['id_lab_order_detail'])->first();
                        LabHistory::where('lab_detail_id',$value['id_lab_order_detail'])->where(
                                          'item_id',$_data['id_lab_item'])->update([
                                            //"lab_detail_id" => $_data['id_lab_order_detail'],
                                            "lab_approve" => $value['lab_result'],
                                            //"patient_id" =>   $_data['order']['id_patient'],
                                            "user_approve" => $request->get('edit')['id_user'],
                                            //"item_id" => $_data['id_lab_item'],
                                            "repeat" => 0,
                                            //"created_at" => Carbon::now('Asia/Bangkok'),
                                            "updated_at" => Carbon::now('Asia/Bangkok')

                                          ]);
                        /*LabHistory::insert([
                            "lab_detail_id" => $_data['id_lab_order_detail'],
                            "lab_approve" => $value['lab_result'],
                            "patient_id" =>   $_data['order']['id_patient'],
                            "user_approve" => $request->get('edit')['id_user'],
                            "item_id" => $_data['id_lab_item'],
                            "repeat" => 0,
                            "created_at" => Carbon::now('Asia/Bangkok'),
                            "updated_at" => Carbon::now('Asia/Bangkok')
                        ]);*/
                    }/*else if($value['lab_result'] == "-"){
                        $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                            'status'=>2
                        ]);
                    }*/

                /**update status */
                $Select = LabOrderDetail::select('status')->where('id_lab_order_main',$value['id_lab_order_main'])->orderBy('status')->get()->toArray();
                $status = $Select[0]['status'];
                $data = LabOrderMain::where('id_lab_order_main',$value['id_lab_order_main'])->update([
                    'status'=>$status
                ]);
            }
        }else{
            /**Normal save lab result */
            echo '<script>console.log("test echo Normal")</script>';
            print_r ($request->get('data'));
            foreach ($request->get('data') as $key => $value) {
                # code...
                $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                    // 'report_id_user'=>$userID,
                    'lab_result'=> $value['lab_result'],
                    'normal_range'=>$value['normal_range'],
                    'edit_id_user' => $request->by_userId
                    // 'approve_id_user' => $request->by_userId
                ]);
                $pos = strrpos($value['normal_range'], "-");
                $statusLab = 0;
                try{
                  $critical_range = strrpos($value['critical_value'], ",")||strrpos($value['critical_value'], "-");
                }
                catch(\Exception $e){
                    // catch code
                }
                if($pos){
                    $normal = explode('-',$value['normal_range']);
                    if($value['lab_result'] < $normal[0]){
                        $statusLab = 1;
                    }
                    if($value['lab_result'] > $normal[1]){
                        $statusLab = 2;
                    }
                    if($value['lab_result'] > $normal[0] && $value['lab_result'] < $normal[1]){
                        $statusLab = 3;
                    }
                    $mean = $normal[1]-$normal[0];
                    $mean = $mean/2;
                    if($value['lab_result']<$normal[0]-$mean){
                        //$statusLab = 4;
                    }else if($value['lab_result']>$normal[1]+$mean){
                        //$statusLab = 5;
                    }
                }
                if($critical_range){
                  try{
                    $critical = explode(',',$value['critical_value']);
                    //$critical =preg_split( "/ (,|-) /", $value['critical_value']);
                    if($value['lab_result'] < $critical[0]){
                      $statusLab = 4;
                    }else if($value['lab_result'] > $critical[1]){
                        $statusLab = 5;
                    }
                  }catch(\Exception $e){
                    // catch code
                  }
                  try{
                    $critical = explode('-',$value['critical_value']);
                    //$critical =preg_split( "/ (,|-) /", $value['critical_value']);
                    if($value['lab_result'] < $critical[0]){
                      $statusLab = 4;
                    }else if($value['lab_result'] > $critical[1]){
                        $statusLab = 5;
                    }
                  }catch(\Exception $e){
                    // catch code
                  }
                }
                $user = session('user')->toArray();
                $userID =$userID = $user['id_user'];
                if($request->has('by_userId')&&$request->get('by_userId')!=null){
                    $userID = $request->get('by_userId');
                }
                //\Log::Debug('check user id pincode:',[$userID]);
                // echo $value['status'] . $value['lab_result_repeat'];
                $timestamp = Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s');
                if($value['status'] == 1 || $value['status'] == 2 && ($value['lab_result_repeat']=="-")){
                    if($value['lab_result'] && $value['lab_result'] != "-"){
                        echo '11111';
                        $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                            'report_id_user'=>$userID,
                            'status' => 3,
                            'lab_result'=> $value['lab_result'],
                            'normal_range'=>$value['normal_range'],
                            'result_flag'=>$statusLab,
                            'report_date'=>$timestamp,
                            'repeat_flag'=>2,
                        ]);

                        LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])
                        ->where('repeat_date',null)->update([
                            'repeat_date'=>Carbon::now('Asia/Bangkok')
                        ]);
                        try{
                          LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])
                          ->where('process_date',null)->update([
                              'process_date'=>Carbon::now('Asia/Bangkok')
                          ]);
                        }
                        catch(\Exception $e){
                            // catch code
                        }


                        LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])
                        ->where('transfer_date',null)->update([
                            'transfer_date'=>Carbon::now('Asia/Bangkok')
                        ]);
                        //add report time date in labOrderMain page
                        LabOrderMain::where('id_lab_order_main' ,$value['id_lab_order_main'])->update([
                            "date_ts" => Carbon::now('Asia/Bangkok'),
                            //"receive_date"  => Carbon::now('Asia/Bangkok'),
                            //"note" => $env[0]['equipment_instance_identifier'],
                            //"status" => $env[0]['observation_result_status_code'] === "F" ? 2 : 0,
                            "id_user" => $userID,
                        ]);
                        $_data = LabOrderDetail::with('order')->where('id_lab_order_detail',$value['id_lab_order_detail'])->first();
                        LabHistory::insert([
                            "lab_detail_id" => $_data['id_lab_order_detail'],
                            "lab_approve" => $value['lab_result'],
                            "patient_id" =>   $_data['order']['id_patient'],
                            "user_approve" => $userID,
                            "item_id" => $_data['id_lab_item'],
                            "repeat" => 0,
                            "created_at" => Carbon::now('Asia/Bangkok'),
                            "updated_at" => Carbon::now('Asia/Bangkok')
                        ]);
                    }else if($value['lab_result'] == "-"){
                        $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                            'status'=>2
                        ]);
                    }
                }else if($value['status'] == 3){
                  if($value['lab_result'] && $value['lab_result'] != "-"){
                      $data = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                          'report_id_user'=>$userID,
                          //'status' => 3,
                          //'lab_result'=> $value['lab_result'],
                          //'normal_range'=>$value['normal_range'],
                          //'result_flag'=>$statusLab,
                          'report_date'=>$timestamp,
                          //'repeat_flag'=>2,
                      ]);
                    }
                }

                /**update status */
                $Select = LabOrderDetail::select('status')->where('id_lab_order_main',$value['id_lab_order_main'])->orderBy('status')->get()->toArray();
                $status = $Select[0]['status'];
                $data = LabOrderMain::where('id_lab_order_main',$value['id_lab_order_main'])->update([
                    'status'=>$status
                ]);
            }
        }

        return response()->json(['success' => true]);
    }
	public function updateGRFResult(Request $request){
		if($request->has('id_lab_detail')&&$request->get('id_lab_detail')!=null){
			if($request->has('egrf')&&$request->get('egrf')!=null){
				//\Log::Debug('updateGRFResult id lab detail:',[$request->get('id_lab_detail')]);
				//\Log::Debug('updateGRFResult eGRF result:',[$request->get('egrf')]);
				$result = LabOrderDetail::where('id_lab_order_detail',$request->get('id_lab_detail'))->update([
                          'eGFR'=>$request->get('egrf')
                      ]);
				return response()->json(['success'=>$result]);
			}else{
				return response()->json(['success'=>false]);
			}
		}else{
			return response()->json(['success'=>false]);
		}
    }
    

    private function Chack_Column($data){
        $name_tanle = $data['name_tanle'];
        $Column_id = $data['Column_id'];
        $id = $data['id'];
        $datatable = DB::table($name_tanle)->where($Column_id, $id)->get()->toArray();
        foreach ($datatable[0] as $key => $value) {
            $data[$key] = $value;
            if ($value != null){
                // echo '[true]';
                $data[$key] = $value;
                $data_st[$key] = true;
            }else{
                // echo '[false]';
                $data[$key] = null;
                $data_st[$key] = false;
            }
            // $data_status[$key];
            // echo $key . "-> $value <br>";
        }
        // echo '<hr>';
        $return_data['data'] = $data;
        $return_data['data_st'] = $data_st;
        return $return_data;
    }
    public function ReportToHotXP(int $id){
        
        $dataChick['name_tanle'] = 'lab_order_main';
        $dataChick['Column_id'] = 'id_lab_order_main';
        $dataChick['id'] = $id;
        $return_data = $this->Chack_Column($dataChick);
        $Data_Column = $return_data['data'];
        $Chack_Column = $return_data['data_st'];
        // print_r($Chack_Column);
        // if ($Chack_Column['lab_order_no']){
        //     echo '<hr>Chack<hr>';
        // }
        $dataa = DB::table('lab_order_main')->where('id_lab_order_main', '=', $id)->get()->toArray();;
        $lab_order_status = $dataa[0]->status;
        if ($lab_order_status != 30){
            $data = DB::table('lab_order_main');
            if ($Chack_Column['id_department']){
                $count_Row = DB::table('department_master')->where('id_department', $Data_Column['id_department'])->count();
                if ($count_Row > 0){
                    $data = $data->join('department_master', 'department_master.id_department', '=', 'lab_order_main.id_department');
                }
            }
            if ($Chack_Column['id_service_plan']){
                $count_Row = DB::table('service_plan_master')->where('id_service_plan', $Data_Column['id_service_plan'])->count();
                if ($count_Row > 0){
                    $data = $data->join('service_plan_master', 'service_plan_master.id_service_plan', '=', 'lab_order_main.id_service_plan');
                }
            }
            if ($Chack_Column['id_clinic']){
                $count_Row = DB::table('clinic_master')->where('id_clinic', $Data_Column['id_clinic'])->count();
                if ($count_Row > 0){
                    $data = $data->join('clinic_master', 'clinic_master.id_clinic', '=', 'lab_order_main.id_clinic');
                }
            }
            if ($Chack_Column['id_doctor']){
                $count_Row = DB::table('doctor_master')->where('id_doctor', $Data_Column['id_doctor'])->count();
                if ($count_Row > 0){
                    $data = $data->join('doctor_master', 'doctor_master.id_doctor', '=', 'lab_order_main.id_doctor');
                }
            }
            if ($Chack_Column['id_patient']){
                $count_Row = DB::table('patient_master')->where('id_patient', $Data_Column['id_patient'])->count();
                if ($count_Row > 0){
                    $data = $data->join('patient_master', 'patient_master.id_patient', '=', 'lab_order_main.id_patient');
                }
            }
            if ($Chack_Column['id_hospital']){
                $count_Row = DB::table('hospital_master')->where('id_hospital', $Data_Column['id_hospital'])->count();
                if ($count_Row > 0){
                    $data = $data->join('hospital_master', 'hospital_master.id_hospital', '=', 'lab_order_main.id_hospital');
                }
            }
            if ($Chack_Column['id_ward']){
                $count_Row = DB::table('ward')->where('id_ward', $Data_Column['id_ward'])->count();
                if ($count_Row > 0){
                    $data = $data->join('ward', 'ward.id_ward', '=', 'lab_order_main.id_ward');
                }
            }
            $data = $data->where('lab_order_main.id_lab_order_main', '=', $id);
            $data = $data->get()->toArray();
            // print_r($data);
            // echo '<hr>';
            
            // echo '<hr>';
            // echo '<hr>';
            // $labRequest = DB::connection('mysql2')->select("select * from lab_request where lab_request_id = 27");
            // // print_r($labRequest[0]->lab_request_data);
            // $request_data = $labRequest[0]->lab_request_data;
            // $str =  iconv('TIS-620','UTF-8',$request_data );         
            // $data_request = explode("|", iconv('TIS-620','UTF-8',$request_data ));
            // $data_MSH = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data ),"MSH"));
            // $data_PID = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data ),"PID"));
            // $data_PV1 = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data ),"PV1"));
            // $data_ORC = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data ),"ORC"));
            // $data_OBR = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data ),"OBR")); 

            // print_r ($data_PID);
            // echo "<hr>";
            // foreach ($data_OBR as $key => $value){
            //     if($value == null){
            //     }else{
            //         echo $key.' -> '.$value.'<br>';
            //     }
            // }
            // echo '<hr>';
            // print_r($data_PV1);
            // echo '<hr>';
            // print_r($data_ORC);
            // echo '<hr>';
            // print_r($data_OBR);
            // echo '<hr>';
            $add_data_MSH[0] = 'MSH';
            $add_data_MSH[1] = '^~\&';
            $add_data_MSH[2] = 'LIS';
            $add_data_MSH[3] = 'Pymain';
            $add_data_MSH[4] = 'HIS';
            $add_data_MSH[5] = 'BMSHOSxP';
            $add_data_MSH[6] = gmdate('Ymdhis', time());
            $add_data_MSH[7] = null;
            $add_data_MSH[8] = 'ORU^R01';
            $add_data_MSH[9] = $data[0]->HosxP_lis; // ไม่มีเลขที่รันจาก lis
            $add_data_MSH[10] = 'P';
            $add_data_MSH[11] = '2.3';
            $Pa_Firstname = $data[0]->patient_firstname;
            $Pa_Lastname = $data[0]->patient_lastname;
            
            $prefix_id = $data[0]->prefix_name;
            $prefix_name = PrefixMaster::select('prefix_name')->where('id_prefix', $prefix_id)->get();
            $patient_tel = $data[0]->patient_tel;
            $patient_birthday = $data[0]->birthday;
            $Prefix = $prefix_name[0]->prefix_name;
            $hn = $prefix_name[0]->hn;
                // echo "<hr>".$Prefix."<hr>";
            if ($prefix_id == 1){
                $sex = 'M';
            }else{
                $sex = 'F';
            }
            $add_data_PID[0] = 'PID';
            $add_data_PID[1] = '1';
            $add_data_PID[2] = null;
            $add_data_PID[3] = $data[0]->HosxP_HN;
            $add_data_PID[4] = null;
            $add_data_PID[5] = $Pa_Lastname.'^'.$Pa_Firstname.'^'.null.'^'.null.'^'.$Prefix.'^^^';
            $add_data_PID[6] = null;
            $add_data_PID[7] = $patient_birthday;
            $add_data_PID[8] = $sex;
            $add_data_PID[9] = null;
            $add_data_PID[10] = '2028-9';
            $add_data_PID[11] = '^^^^'; 
            $add_data_PID[12] = null;
            $add_data_PID[13] = $patient_tel;


            $doctor_id = $data[0]->id_doctor;
            $doctor_name = $data[0]->doctor_name;
            $doctor_lastname = $data[0]->doctor_lastname;
            $id_hospital = $data[0]->id_hospital;
            $id_ward = $data[0]->id_ward;
            if (isset($data[0]->ward_code)){
                $ward_code = $data[0]->ward_code;
            }else{
                $ward_code = null;
            }
            if (isset($data[0]->ward_name)){
                $ward_name = $data[0]->ward_name;
            }else{
                $ward_name = null;
            }
            $add_data_PV1[0] = 'PV1';
            $add_data_PV1[1] = 1;
            $add_data_PV1[3] = '^^'; 
            $add_data_PV1[5] = ''; 
            $add_data_PV1[7] = $doctor_id.'^'.$doctor_name.' '.$doctor_lastname;
            $add_data_PV1[10] = $id_hospital;
            $add_data_PV1[11] = $ward_code.'^'.$ward_name;
            $add_data_PV1[17] = '01^ทดสอบ';
            $add_data_PV1[18] = null; 
            $add_data_PV1[19] = null;
            $add_data_PV1[44] = null; 

            $add_data_ORC[0] = 'ORC';
            $add_data_ORC[1] = 'NW';
            $add_data_ORC[2] = $data[0]->HosxP_LN; //LN
            $add_data_ORC[3] = $data[0]->HosxP_LN; //LN
            $add_data_ORC[9] = gmdate('Ymdhis', time()); //Receive Order Datetime (yyyymmddhhnnss)
            $add_data_ORC[12] = "$doctor_id^$doctor_name"; 
            $add_data_ORC[18] = null; 
            $add_data_ORC[19] = null; 

            $max_add_data_MSH = 11;
            $new_data_MSH = '';
            for ($i=0; $i<=$max_add_data_MSH; $i++){
                if(isset($add_data_MSH[$i])){
                    // $new_data_MSH = $new_data_MSH."[$i] => ";
                    $new_data_MSH = $new_data_MSH.$add_data_MSH[$i].'|';
                }else{
                    // $new_data_MSH = $new_data_MSH."[$i] => ";
                    $new_data_MSH = $new_data_MSH.'|';
                }
            }

            $max_add_data_PID = 13;
            $new_data_PID = '';
            for ($i=0; $i<=$max_add_data_PID; $i++){
                if(isset($add_data_PID[$i])){
                    // $new_data_PID = $new_data_PID."[$i] => ";
                    $new_data_PID = $new_data_PID.$add_data_PID[$i].'|';
                }else{
                    // $new_data_PID = $new_data_PID."[$i] => ";
                    $new_data_PID = $new_data_PID.'|';
                }
            }

            $max_add_data_PV1 = 52;
            $new_data_PV1 = '';
            for ($i=0; $i<=$max_add_data_PV1; $i++){
                if(isset($add_data_PV1[$i])){
                    // $new_data_PV1 = $new_data_PV1."[$i] => ";
                    $new_data_PV1 = $new_data_PV1.$add_data_PV1[$i].'|';
                }else{
                    // $new_data_PV1 = $new_data_PV1."[$i] => ";
                    $new_data_PV1 = $new_data_PV1.'|';
                }
            }
            
            // echo '<hr>'.$new_data_PV1.'<hr>';

            $max_add_data_ORC = 23;
            $new_data_ORC = '';
            for ($i=0; $i<=$max_add_data_ORC; $i++){
                if(isset($add_data_ORC[$i])){
                    // $new_data_ORC = $new_data_ORC."[$i] => ";
                    $new_data_ORC = $new_data_ORC.$add_data_ORC[$i].'|';
                }else{
                    // $new_data_ORC = $new_data_ORC."[$i] => ";
                    $new_data_ORC = $new_data_ORC.'|';
                }
            }

            // echo $new_data_ORC.'<hr>';

            $LabOrderMain = LabOrderItem::select('*')
                ->join('lab_item_master', 'lab_item_master.lab_item_code', '=', 'lab_order_item.lab_item_code')
                ->join('doctor_master', 'doctor_master.id_doctor', '=', 'lab_order_item.id_doctor')
                ->where('id_lab_order_main', $id)->get()->toArray();
            // echo "<hr>";
            $max_add_data_OBR = 45;
            $new_data_OBR = '';

            $max_add_data_OBX = 30;
            $new_data_OBX = '';
            $new_data_OBR_OBX = '';
            $N = 0;
            foreach ($LabOrderMain as $key => $value){
                // print_r($value['lab_item_code']);
                $lab_item_code = $value['lab_item_code'];
                // print_r($value);
                $id_lab_order_item = $value['id_lab_order_item'];
                $lab_item_code = $value['lab_item_code'];
                $lab_item_name = $value['lab_item_name'];
                $id_lab_order_item = $value['id_lab_order_item'];
                $id_lab_item_sub_group = $value['id_lab_item_sub_group'];
                $id_lab_item = $value['id_lab_item'];
                // $lab_result = $value['lab_result'];
                // echo '<hr> -*- ';
                // print_r($value);
                // echo '<hr>';

                $LabSubGroupItemMaster = LabSubGroupItemMaster::select('*')->where('id_lab_sub_group_item', $id_lab_item_sub_group)->get()->toArray();
                // echo '<hr>';
                $LabItemMaster = $LabSubGroupItemMaster[0];
                // print_r($LabItemMaster);
                $lab_sub_group_code = $LabItemMaster['lab_sub_group_code'];
                $lab_sub_group_name = $LabItemMaster['lab_sub_group_code'];
                $lab_specimen = $value['lab_specimen'];
                $id_doctor = $value['id_doctor'];
                $doctor_name = $value['doctor_name'];
                $doctor_lastname = $value['doctor_lastname'];
                // echo '<hr>';
                $add_data_OBR[$key][0] = 'OBR';
                $add_data_OBR[$key][1] = $key+1;
                $add_data_OBR[$key][2] = $data[0]->HosxP_LN; //Ex.624419805 LN
                $add_data_OBR[$key][3] = $data[0]->HosxP_LN; //Ex.624419805 LN
                //

                //
                $add_data_OBR[$key][4] = "$lab_item_code^$lab_item_name^$lab_sub_group_code $lab_sub_group_name^^^$lab_sub_group_name"; //Ex.P3^Creatinine^02 CHEMISTRY^^^CHEMISTRY
                $add_data_OBR[$key][5] = 'R'; //Priority S = Stat, R = Routine, A = Abrupt Ex.R
                $add_data_OBR[$key][6] = gmdate('Ymdhis', time()); //Request Datetime (yyyymmddhhnnss) Ex.20190806085607
                $add_data_OBR[$key][15] = $lab_specimen; //Specimen Code^Specimen Name Ex.04&Clot Blood 3-5 mL
                $add_data_OBR[$key][16] = "$id_doctor^$doctor_name $doctor_lastname"; //Ex.0771^กนกพร ศรีรัตนวงศ์ (พญ.)
                $add_data_OBR[$key][18] = null; //Ward Code^Ward Name Ex.201^LR

                $LabOrderDetail = LabOrderDetail::select('*')->where('id_lab_order_main', $id)->where('id_lab_item',  $id_lab_item)->get()->toArray(); //ตามมา
                if(isset($LabOrderDetail[0]['lab_result'])){
                    $l_lab_result = $LabOrderDetail[0]['lab_result'];
                }else{
                    $l_lab_result = null;
                }
                $add_data_OBX[$key][0] = 'OBX';
                $add_data_OBX[$key][1] = '1';
                $add_data_OBX[$key][2] = 'ST';
                $add_data_OBX[$key][3] = "$lab_item_code^$lab_item_name";
                $add_data_OBX[$key][5] = $l_lab_result; //data
                $add_data_OBX[$key][6] = $value['lab_item_unit']; //pg/mL
                $add_data_OBX[$key][7] = $value['ranges']; //2.0-4.4
                $add_data_OBX[$key][8] = 'L'; /*LL = Below Critical L = Below Normal Value
                                            N = Normal Value H = Above Normal Value
                                            HH = Above Critical Value*/
                
                $add_data_OBX[$key][11] = 'F'; //F = Final C = Cancel
                $add_data_OBX[$key][14] = gmdate('Ymdhis', time());
                $add_data_OBX[$key][16] = 'u0952^u0952';

                for ($i=0; $i<=$max_add_data_OBR; $i++){
                    if(isset($add_data_OBR[$key][$i])){
                        // $new_data_OBR = $new_data_OBR."[$N] => ";
                        $new_data_OBR = $new_data_OBR.$add_data_OBR[$key][$i].'|';
                        $new_data_OBR_OBX = $new_data_OBR_OBX.$add_data_OBR[$key][$i].'|';
                    }else{
                        // $new_data_OBR = $new_data_OBR."[$N] => ";
                        $new_data_OBR = $new_data_OBR.'|';
                        $new_data_OBR_OBX = $new_data_OBR_OBX.'|';
                    }
                }
                $new_data_OBR_OBX = $new_data_OBR_OBX."\n";
                for ($i=0; $i<=$max_add_data_OBX; $i++){
                    if(isset($add_data_OBX[$key][$i])){
                        // $new_data_OBR = $new_data_OBR."[$N] => ";
                        $new_data_OBX = $new_data_OBX.$add_data_OBX[$key][$i].'|';
                        $new_data_OBR_OBX = $new_data_OBR_OBX.$add_data_OBX[$key][$i].'|';
                    }else{
                        // $new_data_OBR = $new_data_OBR."[$N] => ";
                        $new_data_OBX = $new_data_OBX.'|';
                        $new_data_OBR_OBX = $new_data_OBR_OBX.'|';
                    }
                }
                $new_data_OBR_OBX = $new_data_OBR_OBX."\n";
                // $new_data_OBR = $new_data_OBR . '<br>';
                // $new_data_OBX = $new_data_OBX . '<br>';
                // $new_data_OBR_OBX = $new_data_OBR_OBX . '<br>';
                // echo $id_lab_item;
                // print_r($LabOrderDetail);
                // echo '789888888<hr>';
                // $lab_result = $LabOrderDetail['lab_result'];

            }
            // echo $new_data_OBR.'***<hr>';


            // $all_data = $new_data_MSH.$new_data_PID.$new_data_PV1.$new_data_ORC.'<br>'.$new_data_OBR.'<br>'.$new_data_OBX;
            $all_data = $new_data_MSH."\n".$new_data_PID."\n".$new_data_PV1."\n".$new_data_ORC."\n".$new_data_OBR_OBX;
            $lab_order_no = $data[0]->lab_order_no;
            // print_r($all_data);
            $return_data = $all_data;
            $all_data =  iconv('UTF-8','TIS-620',$all_data ); //เข้ารหัส
            // echo '<hr>';
            // print_r($all_data);
            DB::connection('mysql2')->table('lab_result')->insert([
                "lab_result_lon" => $lab_order_no,
                "lab_result_msg_type" => 'ORU^R01',
                "lab_result_data" => $all_data,
                "lab_result_datatype_id" => '1',
                "lab_result_note" => null,
                "lab_result_datetime" => gmdate('Y-m-d h:i:s', time()),
                "lab_result_receive" => 'N',
                "lab_result_receive_datetime" => null,
                "lab_result_receive_data" => null
            ]);
            LabOrderMain::where('id_lab_order_main',$id)->update([
                'status'=> '4'
            ]);





            // echo "<hr>";
            // foreach ($data[0] as $key => $value){
            //     echo $key."  =>  ".$value;
            //     echo '<br>';
            // }
            return response()->json(['Status' => true, 'data' => $return_data, 'txt'=> '']);
        }else{
            return response()->json(['Status' => false, 'data' => [], 'txt'=> 'status != 3']);
        }
	}



    public function cancelApprove(Request $request){
      $user = session('user')->toArray();
      $userID = $user['id_user'];
      $value = $request->get('data');
      Log::debug('cancelApprove value',$value);
      //change lab order main to reported status
      LabOrderMain::where('id_lab_order_main',$value[0]['id_lab_order_main'])->update([
          'status'=>3,
      ]);
      //change all lab detail to Reported status
      LabOrderDetail::where('id_lab_order_main',$value[0]['id_lab_order_main'])->update([
          'status'=>3,
          'cancel_approve_id_user'=>$userID,
          'cancel_approve_date'=>Carbon::now("Asia/Bangkok"),
          'edit_approve_date'=>null,
          'edit_approve_id_user'=>null,
      ]);
      //update cancel approve user and date
      //update edit approve user and date
      return response()->json(['success' => true]);
    }
    /**
     * #################
     * insert critical
     * #################
     */

     public function critical(Request $request){
       
        Critical::insert([
            "reciver_name" => $request->get('data')['recevied'],
            "report_name" => $request->get('data')['reporter'],
            "department" => $request->get('data')['department'],
            "cause" => $request->get('data')['cause'],
            "patient_id" => $request->get('data')['patient'],
            "order_main_id" => $request->get('data')['orderID'],
            "status" => 0,
            "created_at" => Carbon::now("Asia/Bangkok"),
            "updated_at" => Carbon::now("Asia/Bangkok")
        ]);
        LabOrderDetail::where('id_lab_order_main', $request->get('data')['orderID'])->where('id_lab_item',$request->get('data')['idLabItem'])->update([
            'reported'=> 0,
        ]);
        return response()->json(['success' => true]);
    }
    public function cancel(Request $request){
        $user = session('user')->toArray();
        $userID = $user['id_user'];
        $timestamp = Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s');
        $reason = $request->get('data')['reason'];
        \Log::debug('data',[$userID, $timestamp, $reason]);
        Cancel::insert([
            "cancel_approve_id_user" => $userID,
            "cancel_approve_date" => $timestamp,
            "reason_text" => $reason
        ]);
        LabOrderDetail::where('id_lab_order_main', $request->get('data')['orderID'])->where('id_lab_item',$request->get('data')['idLabItem'])->update([
            'reported'=> 0,
        ]);
        return response()->json(['success' => true]);
    }
    public function ConfirmResults(Request $request){
        $user = session('user')->toArray();
        $userID = $user['id_user'];
        if($request->has('by_userId')&&$request->get('by_userId')!=null){
            $userID = $request->get('by_userId');
        }
        $labItem = $request->get('data');
        //echo "<script>console.log('ConfirmResults:',$labItem)</script>";
        if($labItem!=null){
          if($labItem[0]['roles_edit']!=null){
              if($labItem[0]['isEdit']!=null){
                if($labItem[0]['isEdit']){
                $userID = $labItem[0]['roles_edit']['id_user'];
              }
            }
          }
        }
        $history = LabOrderDetail::with('order')->where('id_lab_order_main', $labItem[0]['id_lab_order_main'])->get();
        $tmp = array();
        foreach ($history as $key => $value) {
            if($value['status'] != 4 && $value['lab_result'] != '-' && $value['lab_result'] != '0'){
                $tmp[$key] = $value;
            }
        }
        /*foreach ($tmp as $key => $value) {
            LabHistory::insert([
                "lab_detail_id" => $value['id_lab_order_detail'],
                "lab_approve" => $value['lab_result'],
                "patient_id" =>   $value['order']['id_patient'],
                "user_approve" => $userID,
                "item_id" => $value['id_lab_item'],
                "created_at" => Carbon::now('Asia/Bangkok'),
                "updated_at" => Carbon::now('Asia/Bangkok')
            ]);
        }*/
        foreach ($labItem as $key => $value) {
            // print_r($value);
            // echo "<hr>";
            // if($value['status'] == 3){
                if($value['cancel_approve_id_user']!=null){//have cancel approve
                  LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                      'edit_approve_id_user'=>$userID,
                      'status'=>4,
                      'edit_approve_date'=>Carbon::now('Asia/Bangkok'),
                  ]);
                }else{
                    // echo $value['id_lab_order_detail'];
                  LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                      'approve_id_user'=>$userID,
                      'status'=>4,
                      'approve_date'=>Carbon::now('Asia/Bangkok'),
                  ]);
                }
            // }
        }

        $check = LabOrderDetail::with('order')->where('id_lab_order_main', $labItem[0]['id_lab_order_main'])->get();
        $update = true;
        foreach ($check as $key => $value) {
            # code...
            if($value->status !== 4){
                $update = false;
            }
            /*if($value['status'] != 4){
                LabHistory::insert([
                    "lab_detail_id" => $value['id_lab_order_detail'],
                    "lab_approve" => $value['lab_result'],
                    "patient_id" =>   $value['order']['id_patient'],
                    "user_approve" => $userID,
                    "item_id" => $value['id_lab_item'],
                    "created_at" => Carbon::now('Asia/Bangkok'),
                    "updated_at" => Carbon::now('Asia/Bangkok')
                ]);
            }*/
        }

        // if($update){
        //     LabOrderMain::where('id_lab_order_main',$labItem[0]['id_lab_order_main'])->update([
        //         'status'=>4
        //     ]);
        // }
        return response()->json(['success'=>true,'update'=>$update]);
    }

    public function ConfirmResult(int $id, int $idmain, string $resultlab)//approve process
    {
        $user = session('user')->toArray();
        $userID = $user['id_user'];
        print_r($id);
        print_r($idmain);
        print_r($resultlab);
        //echo 'asdsad';
        if($resultlab != "-"){
            LabOrderDetail::where('id_lab_order_detail',$id)->update([
                'approve_id_user'=>$userID,
                'status'=>4,
                'approve_date'=>Carbon::now('Asia/Bangkok')
            ]);
            LabOrderMain::where('id_lab_order_main',$idmain)->update([
                'status'=>4
            ]);
        }else if($resultlab == "-"){
            LabOrderMain::where('id_lab_order_main',$idmain)->update([
                'status'=>2
            ]);
        }

        $Select = LabOrderDetail::select('status')->where('id_lab_order_main',$idmain)->orderBy('status')->get()->toArray();
        $status = $Select[0]['status'];

        $data = LabOrderMain::where('id_lab_order_main',$idmain)->update([
            'status'=>$status
        ]);

        return response()->json(['success'=>true,'test'=>'OK']);
    }

    public function AutoResult(int $id)
    {
        $AutoResult = LabItemMaster::select('*')->where('stdel',0)->where('id_lab_item',$id)->get()->toArray();
        $data = json_encode(array('data'=>$AutoResult),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function AllRepeat(Request $request)
    {
        foreach ($request->get('data') as $key => $value) {
            # code...
            LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                'repeat_flag'=>1,
                'result_flag'=>0,
                "status" => 2,
                //"lab_result_repeat" => $value['lab_result'],
                //"lab_result" => "-"
            ]);
            $lab = LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->get();
            foreach ($lab as $key => $value) {
                # code...
                LabOrderMain::where('id_lab_order_main', $value['id_lab_order_main'])->update([
                    'status' => 2
                ]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function Repeat(Request $request)
    {
        LabOrderDetail::where('id_lab_order_detail',$request->input('_id'))->update([
            "repeat_flag" => 1,
            "result_flag" => 0,
            "status" => 2,
            //"lab_result_repeat" => $request->input('result'),
            //"lab_result" => "-"
        ]);

        $lab = LabOrderDetail::where('id_lab_order_detail',$request->input('_id'))->get();
        foreach ($lab as $key => $value) {
            # code...
            LabOrderMain::where('id_lab_order_main', $value['id_lab_order_main'])->update([
                'status' => 2
            ]);
        }
        /**/
        return response()->json(['success'=>true, 'data' =>  $lab]);
    }
    /**
     * #############################
     * Transfer Lab Result
     * ############################
     */
    public function totalTransfer(Request $request){
      $user = session('user')->toArray();
      //echo "<script>console.log('userTransfer:',$user)</script>";
      $user_id= $user['id_user']!=null ? $user['id_user']:1;
        foreach ($request->get('data') as $key => $value) {
            # code...
            if($value['lab_result_repeat'] != "-"){
                $pos = strrpos($value['normal_range'], "-");
                $statusLab = 0;
                if($pos){
                    $normal = explode('-',$value['normal_range']);
                    if($value['lab_result']  < $normal[0]){
                        $statusLab = 1;
                    }
                    if($value['lab_result']  > $normal[1]){
                        $statusLab = 2;
                    }
                    if($value['lab_result']  > $normal[0] && $value['lab_result'] < $normal[1]){
                        $statusLab = 3;
                    }
                }

                LabOrderDetail::where('id_lab_order_detail',$value['id_lab_order_detail'])->update([
                    "lab_result_repeat" => "-",
                    "lab_result" => $value['lab_result_repeat'],
                    'result_flag'=>$statusLab,
                    "transfer_date" => Carbon::now('Asia/Bangkok'),
                    'status' =>3,
                ]);

                LabOrderMain::where('id_lab_order_main', $value['id_lab_order_main'])->update([
                    'status' => 3
                ]);

                /**/
                $_main = LabOrderMain::where('id_lab_order_main', $value['id_lab_order_main'])->get();
                LabHistory::insert([
                    "lab_detail_id" => $value['id_lab_order_detail'],
                    "lab_approve" => $value['lab_result_repeat'],
                    "patient_id" =>  $_main[0]['id_patient'],
                    "user_approve" => $user_id,
                    "repeat" => 1,
                    "item_id" => $value['id_lab_item'],
                    "created_at" => Carbon::now('Asia/Bangkok'),
                    "updated_at" => Carbon::now('Asia/Bangkok')
                ]);
                //Log::debug('total transfer value',$value);
            }
        }
        return response()->json(['success'=>true]);
    }

    public function transfer(Request $request)
    {
        $lab = LabOrderDetail::where('id_lab_order_detail',$request->input('_id'))->get();
        $pos = strrpos($lab[0]['normal_range'], "-");
        $analyzer_id = $lab[0]['analyzer_id'];
            $statusLab = 0;
            if($pos){
                $normal = explode('-',$lab[0]['normal_range']);
                if($request->input('result') < $normal[0]){
                    $statusLab = 1;
                }
                if($request->input('result') > $normal[1]){
                    $statusLab = 2;
                }
                if($request->input('result') > $normal[0] && $request->input('result') < $normal[1]){
                    $statusLab = 3;
                }
        }

        LabOrderDetail::where('id_lab_order_detail',$request->input('_id'))->update([
            "lab_result_repeat" => "-",
            "lab_result" => $request->input('result'),
            'result_flag'=>$statusLab,
            'status' =>3,
            "transfer_date" => Carbon::now('Asia/Bangkok'),
            'analyzer_id' => $analyzer_id
        ]);

        foreach ($lab as $key => $value) {
            # code...
            LabOrderMain::where('id_lab_order_main', $value['id_lab_order_main'])->update([
                'status' => 3
            ]);
        }
        /**/
        $user = session('user')->toArray();
        //echo "<script>console.log('userTransfer:',$user)</script>";
        $user_id= $user['id_user']!=null ? $user['id_user']:1;
        $_main = LabOrderMain::where('id_lab_order_main', $lab[0]['id_lab_order_main'])->get();
        LabHistory::insert([
            "lab_detail_id" => $request->input('_id'),
            "lab_approve" => $request->input('result'),
            "patient_id" =>  $_main[0]['id_patient'],
            "user_approve" => $user_id,
            "repeat" => 1,
            "item_id" => $lab[0]['id_lab_item'],
            "created_at" => Carbon::now('Asia/Bangkok'),
            "updated_at" => Carbon::now('Asia/Bangkok'),
            'analyzer_id' => $analyzer_id
        ]);

        return response()->json(['success'=>true, 'data' =>  $lab]);
    }

    public function authorized(Request $request){
        $user = UserMaster::where('username', $request->get('data')['user'])->first();
        if($user){
            $pwd = UserMaster::where('username', $user->username)
            ->where('password',md5($request->get('data')['pwd']))->first();
            if($pwd){
                if($pwd->id_group_user == 3){
                    return response()->json(['success' => true, 'message' => 'successfully', 'data' => $pwd]);
                }else {
                    # code...
                    return response()->json(['success' => false,'type' => 'permission', 'message' => 'Permission denied']);
                }
            }else{
                return response()->json(['success' => false,'type' => 'password', 'message' => 'Invalid password']);
            }
        }else{
            return response()->json(['success' => false,'type' => 'username', 'message' => 'Invalid username']);
        }
    }

    public function PrintLab(int $id)
    {
        $select = VLabOrderDetail::select('*')->leftJoin('lab_item_master', 'vlab_order_detail.id_lab_item', '=', 'lab_item_master.id_lab_item')
        ->with(['critical' => function($q){
            $q->limit(1);
        }])->with('labMain')->where('id_lab_order_main',$id)->orderBy('vlab_order_detail.ordered')->get();
        foreach ($select as $key => $value) {
            # code...
            $value['lab_result'] = number_format((float)$value['lab_result'],(float)$value['_decimal']);
            if($value['edit_approve_id_user']!=null){

            }
        }
        \Log::info('detail',[$select]);
        $pdf = PDF::loadView('main.recorded-results.labresultpdf',['detail'=>$select]);
        return @$pdf->stream();
    }

    public function PrintTotalLab(Request $request){
        $_id = "";
        foreach ($request->all() as $value) {
            # code...
            $_id =  $_id . $value .",";
        }
        $_id = substr_replace($_id, "", -1);

        $output = public_path() .'/report/'.time() . '_labresult';

        $report = new JasperPHP;
        $report->compile(public_path().'/report/labresult.jrxml')->execute();

        $report->process(
            public_path().'/report/labresult.jasper',
            $output,
            array('pdf'),
            array(
                'iD' => $_id
            ),
            \Config::get('database.connections.mysql')
            )->execute();

            //dd($report);

            $file = $output . '.pdf';
            $path = $file;

            if (!file_exists($file)) {
                abort(404);
            }
            $file = file_get_contents($file);
            File::delete($path);
            return response($file, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
    }
    public function exportWithSelectLab(Request $request){
      $labchecked = $request->get('labchecked');
      $labchecked = ltrim($labchecked, ',');
      $labchecked = json_decode('[' . $labchecked . ']', true);
      $lab_data=[];
//\Log::Debug('$lab_data is :',[$labchecked]);
//
      $lab_data = LabOrderMain::with('detail')->with('patient')->where('stdel',0)->whereIn('id_lab_order_main',$labchecked)->where('status','>=',3)->OrderBy('id_lab_order_main','ASC')->get();

        //$lab_data = DB::table('lab_order_main')->get()->toArray();
        $lab_array[] = [
            // 'id_lab_order_main' => $value->id_lab_order_main,
            'lab_order_no' ,
      			'hn',
      			'name',
      			'surname',
        ];


        $AlllabItem = LabItemMaster::all()->where('stdel',0);
        $allLabItemArray =[];
        foreach ($AlllabItem as $key => $value) {
          array_push($allLabItemArray,$value->lab_item_code);
         }
         $lab_array=  array_merge($lab_array[0],$allLabItemArray);
         $lab_array = [$lab_array];
        //Log::Debug('test-----$lab_array',$lab_array);
		$labNoDigit=9;
        for($i=0;$i<count($lab_data);$i++){
        //   $newlabno = substr($lab_data[$i]->lab_order_no,0,$labNoDigit);
            $newlabno = $lab_data[$i]->lab_order_no;
          $lab_array[] = [
              'lab_order_no' => $newlabno,
      			  'hn'=>$lab_data[$i]['patient']->hn,
      			  'name' =>$lab_data[$i]['patient']->patient_firstname,
      			  'surname'=>$lab_data[$i]['patient']->patient_lastname,
          ];
         $labItemThatAssign =[];
         foreach($lab_data[$i]['detail'] as $k => $val){
			       foreach ($AlllabItem as $key => $value) {
              if($val->id_lab_item==$value->id_lab_item){
                //Log::Info('$lab_array-->',[$lab_array]);
                if($val->lab_result!=null){
				  //Log::Info('$lab_array in match-->',[$value->lab_item_code,$val->lab_result]);
                  $decimal =$value->_decimal;
                  $labResultValue = number_format((float)$val->lab_result,$decimal);
                  $lab_array[$i+1][$value->lab_item_code]=$labResultValue;
        				  array_push($labItemThatAssign,$value->lab_item_code);

        					break;
                }else{
                          $lab_array[$i+1][$value->lab_item_code]=null;
        				  break;
                }

              }else{
      				  if(in_array($value->lab_item_code,$labItemThatAssign,false)){

      				  }else{
      					//Log::Info('$lab_array is null-->',[$value->id_lab_item,$value->lab_item_code]);
      					$lab_array[$i+1][$value->lab_item_code]=null;
      				  }
              }
            }
          }
            //Log::Debug('$lab_array:',[$lab_array[$i]]);


    }
        Excel::create('Lab data', function($excel) use ($lab_array){
            $excel->setTitle('Lab data');
            $excel->sheet('Lab data', function($sheet) use ($lab_array){
				$sheet->freezeFirstRow();
                $sheet->fromArray($lab_array,null,'A1',false,false);
            });
        })->download('xlsx');

    }
}
