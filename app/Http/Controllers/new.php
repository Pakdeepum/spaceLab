<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vpatient;
use App\HospitalMaster;
use App\DepartmentMaster;
use App\ClinicMaster;
use App\DoctorMaster;
use App\ServicePlanMaster;
use App\Ward;
use App\LabSubGroupItemMaster;
use App\VlabItem;
use App\LabOrderMain;
use App\LabOrderDetail;
use App\VLabOrderMain;
use App\AppointmentOrderData;
use App\RejectSpecimentNote;
use App\RejectSpecimentOrder;
use App\VSpecimentRejectList;
use App\PatientMaster;
use App\LabItemMaster;
use App\LabSpecimenItem;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Carbon\Carbon;
use DB;
use Log;
use Maatwebsite\Excel\Facades\Excel;


class MainRecieveLabController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');

        return view('main.recieve-lab.main-recieve-lab-dashboard',$data);
    }
    //insert LabOrderMain
    public function AddLabOrderByImportExcel(array $request)
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $userID = $user['id_user'];
        //$request = $request->all();
        Log::Debug('-------------------AddLab Request--------------------',$request);

        $labItemList = $request['lab_item_data'];
        Log::Debug('------------------LabItemList--------------------------',$labItemList);
        $barcodeType = array();//keep specimen type
        $startCode = "S";//for edit started barcode S is ser U is Urine W is Whole Blood
        $testStartCode = array();
        foreach ($labItemList as $key => $value) {//loop check specimen each lab item
          $item_specimen = LabItemMaster::select('*')->where('id_lab_item',$value['id_lab_item'])->with('specimen')->get()->toArray();
          $specimenCode = $item_specimen[0]['specimen']['lab_specimen_item_code'];
          if(!array_key_exists($specimenCode,$barcodeType)){
            $barcodeType[$specimenCode] = array();//key is Specimen type such as SER URI WBL if none then new array
          }
          array_push($barcodeType[$specimenCode],$value['id_lab_item']);//push id lab item to specimen
        }
        $num_lab_barcode=0;//counter lab order main num
        $lab_main_id = array();//for hold id_lab_order_main that is from specimen type
        $removeChar = array("S1","U1","W1");//for remove header start barcode for counter lab no.
        foreach ($barcodeType as $key => $value) {//loop insert new Lab no. per specimen type if havve 1 insert 1 record if have 2(such as SER ,URI) insert 2 record
            $num_lab_barcode = count($barcodeType[$key])>0?$num_lab_barcode+1:$num_lab_barcode;
            if(!array_key_exists($key,$lab_main_id)){
              $lab_main_id[$key] =0;//init data id
            }
            if($key!=""){
              $startCode = substr($key, 0, 1);
              array_push($removeChar,$startCode."1");
              array_push($testStartCode,$startCode);
            }else{
              $startCode = "S";
              array_push($removeChar,$startCode."1");
              array_push($testStartCode,$startCode);
            }
            if($request['idpatient']!=null){
                $labno = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->get()->toArray();
                $dataMain = null;
                $barcodeTotalDigit = 20;
                $labNoDigit = 7;//num of digit after S to E
                $StartChar=$startCode."1";//change S to S1 for startChar
    			      $EndChar = "";
                if(count($labno) > 0){
    				        $newlabno = $labno[0]['lab_order_no'];
                    foreach ($removeChar as $value){
                      $newlabno = str_replace($value,"",$newlabno);
                    }
    				        $newlabno = substr($newlabno,0,$labNoDigit);
                    //this is for BA200 Issue
                    //format barcode 20 digit to S0000000E00000000 barcode is between S and E,After E is Mock value 0 to have 20 digit
                    $newlabno = $newlabno + 1;
                    $newlabno = str_pad($newlabno, $labNoDigit, '0', STR_PAD_LEFT);
                    $newlabno = str_pad($newlabno, $labNoDigit+strlen($StartChar), $StartChar, STR_PAD_LEFT);
                    $newlabno .= $EndChar;
                    $newlabno = str_pad($newlabno, $barcodeTotalDigit, '0', STR_PAD_RIGHT);
                    $dataMain = LabOrderMain::insert([
                        'lab_order_no'=>$newlabno,
                        'id_department'=>$request['iddepartment'],
                        'id_service_plan'=>$request['idservice_plan'],
                        'id_clinic'=>$request['idclinic'],
                        'id_patient'=>$request['idpatient'],
                        'id_doctor'=>$request['iddoctor'],
                        'id_ward'=>$request['idward'],
                        'id_hospital_send'=>$request['idhospital'],
                        'id_sevice_point'=>$request['OPDIPD'],
                        'order_date'=> Carbon::now('Asia/Bangkok'),
                        'id_hospital'=>$hospitalID,
                        'id_user'=>$userID,
                        'order_id_user' => $userID
                    ]);
                }else{
                    $newlabno = str_pad(1, $labNoDigit, '0', STR_PAD_LEFT);
                    $newlabno = str_pad($newlabno, $labNoDigit+strlen($StartChar), $StartChar, STR_PAD_LEFT);
                    $newlabno .= $EndChar;
                    $newlabno = str_pad($newlabno, $barcodeTotalDigit, '0', STR_PAD_RIGHT);
                    $dataMain = LabOrderMain::insert([
                        'lab_order_no'=>$newlabno,
                        'id_department'=>$request['iddepartment'],
                        'id_service_plan'=>$request['idservice_plan'],
                        'id_clinic'=>$request['idclinic'],
                        'id_patient'=>$request['idpatient'],
                        'id_doctor'=>$request['iddoctor'],
                        'id_ward'=>$request['idward'],
                        'id_hospital_send'=>$request['idhospital'],
                        'id_sevice_point'=>$request['OPDIPD'],
                        'order_date'=>Carbon::now('Asia/Bangkok'),
                        'id_hospital'=>$hospitalID,
                        'id_user'=>$userID ,
                        'order_id_user' => $userID
                    ]);
                }

            }
        }

        $testData = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->limit($num_lab_barcode)->get()->toArray();//select last insert lab order main
        $index_lab_order = $num_lab_barcode-1;//for reverse
        foreach ($barcodeType as $key => $value) {
          if($index_lab_order<=0) {$index_lab_order=0;}
          if(count($barcodeType[$key])>0){
            if($lab_main_id[$key]==0){
              $lab_main_id[$key] = $testData[$index_lab_order]['id_lab_order_main'];
              $index_lab_order--;
              continue;
            }
          }
        }
        //maping id lab order main and lab item id return json for add lab item detail
        $dataPairLabMainIdAndItemId = array();
        $indexRun = 0;
        foreach ($barcodeType as $keySpecimen => $valueLabItem) {
          foreach ($valueLabItem as $key => $value) {
            if(array_keys($lab_main_id)[$indexRun]==$keySpecimen){
              if(!array_key_exists($value,$dataPairLabMainIdAndItemId)){
                $dataPairLabMainIdAndItemId[$value] = array();
              }
              $dataPairLabMainIdAndItemId[$value] = $lab_main_id[$keySpecimen];
            }
          }
          $indexRun++;
        }
        //-------------------------------------------------------------------------
        //add lab order detail
        $datavalue = $request['lab_item_data'];
        $num_lab_barcode  = $num_lab_barcode;
        $lab_main_id_array = $lab_main_id;
        $lab_item_id_array = $barcodeType;
        $mapIdMainAndLabId_array = $dataPairLabMainIdAndItemId;
        $datauser = session('user');
        /*$datalab = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->limit($num_lab_barcode)->get()->toArray();
        $idlab = $datalab[0]['id_lab_order_main'];*/

        foreach ($mapIdMainAndLabId_array as $key => $value) {
          $dataDetail = LabOrderDetail::insert([
              'id_lab_order_main'=>$value,
              'id_lab_item'=>$key
          ]);
        }

        return response()->json(['success'=>true,'data' => $barcodeType,'num_lab_barcode'=>$num_lab_barcode,'lab_main_id'=>$lab_main_id,'testData'=>$testData,'mapIdMainAndLabId'=>$dataPairLabMainIdAndItemId]);
        //Log::Debug('AddLab specimen',$test);

    }
    public function import(Request $request)
    {
        // $this->validate($request, [
        //     'file' => 'required|mimes:xls,xlsx'
        // ]);
        if(!$request->file('file')){
          return back();
        }
        $path = $request->file('file')->getRealPath();
        $importData = Excel::load($path, function($reader){
        })->get();

        $AlllabItem = LabItemMaster::all()->where('stdel',0);
        // \Log::info([$importData]);
        if($importData->count() > 0){
            $LabOrderImport = [];
             $jsonData = json_decode($importData, true);
             \Log::info('$importData count',[count($importData)]);
             \Log::info('$jsonData count',[count($jsonData)]);
             // \Log::info('$jsonData data',$jsonData);
             for($i=0;$i<count($jsonData);$i++){//loop each row of excel
               $LabOrderImport[$i] = ['lab_item_data'=>[]];
               foreach ($AlllabItem as $k => $val) {//loop check head colum of lab exist all lab item in database
                 //trim and replac for key of jsondata
                $labItemCode =strtolower($val->lab_item_code);
                $labItemCode = rtrim($labItemCode, ' ');
                $labItemCode = str_replace(' ', '_',$labItemCode);
                $labItemCode = str_replace('%', '',$labItemCode);
                $labItemCode = str_replace('-','_',$labItemCode);
                $labItemCode = rtrim($labItemCode, '_');
                $labItemCode = rtrim($labItemCode, '+');
                if(array_key_exists($labItemCode,$jsonData[$i])){//check if header excel has lab item code match data base
                  if($jsonData[$i][$labItemCode]!=null &&$jsonData[$i][$labItemCode] !=0 ){
                    // \Log::info('data match',[$labItemCode]);
                    //   \Log::info('has data is ',[$jsonData[$i][$labItemCode]]);
                      array_push($LabOrderImport[$i]['lab_item_data'],$val);
                  }
                  // \Log::info('has data is  info',[$labItemCode]);
                }else{
                    // \Log::info('not have key',[$labItemCode]);
                }
               }
               //then assign data of each row such as lab no hn surname
               //search patient by HN
               $user = session('user')->toArray();
               $hospitalID = $user['id_hospital'];
               $userID = $user['id_user'];
               $patient = PatientMaster::with('prefix')->with('nationality')->where('stdel',0)->where('hn', $jsonData[$i]['hn'])->where('id_hospital',$hospitalID)->get();
               if($patient!=null){
                 foreach ($patient as $index => $value) {
                     # code...
                     $dbDate = \Carbon\Carbon::parse($value['birthday']);
                     $value['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
                 }
               }
               // \Log::Debug('patient',[$patient]);
               //set default value

               $LabOrderImport[$i]['iddoctor'] = 1;
               $LabOrderImport[$i]['idward'] = 1  ;
               $LabOrderImport[$i]['idhospital'] = 1;
               $LabOrderImport[$i]['OPDIPD'] = 1;
               $LabOrderImport[$i]['iddepartment'] = 3;
               $LabOrderImport[$i]['idservice_plan'] = null;
               $LabOrderImport[$i]['idclinic'] = 1;

               //set value from excel
			   if(array_key_exists('id_department',$jsonData[$i])){
				   if($jsonData[$i]['id_department']!=null){
						$LabOrderImport[$i]['iddepartment'] = $jsonData[$i]['id_department'];
				   }
			   }
               if(array_key_exists('id_service_plan',$jsonData[$i])){
				   if($jsonData[$i]['id_service_plan']!=null){
					 $LabOrderImport[$i]['idservice_plan'] = $jsonData[$i]['id_service_plan'];
				   }
			   }
			   if(array_key_exists('id_clinic',$jsonData[$i])){
				   if($jsonData[$i]['id_clinic']!=null){
					 $LabOrderImport[$i]['idclinic'] = $jsonData[$i]['id_clinic'];
				   }
			   }
               //$LabOrderImport[$i]['idpatient'] = $jsonData[$i]['id_patient'];
               if($patient!=null){
                 if(count($patient)>0){
                   $sex = $jsonData[$i]['sex'];
                   $prefixName = 1;
                   if('male'==strtolower($sex)){
                     $sex=1;
                     $prefixName=1;
                   }else if('female'==strtolower($sex)){
                     $sex=2;
                     $prefixName=2;
                   }else{
                     $sex=1;
                     $prefixName=1;
                   }
                   $idprivateDoctor=1;
                    if(array_key_exists('id_doctor',$jsonData[$i])){
                      if($jsonData[$i]['id_doctor']!=null){
                      $idprivateDoctor = $jsonData[$i]['id_doctor'];
                      }
                    }

                   $pid = DB::table('patient_master')->insertGetId(
                      [ "id_hospital" => $hospitalID,
                       "hn" => $jsonData[$i]['hn'],
                       "prefix_name" => $prefixName,
                       "patient_firstname" => $jsonData[$i]['name'],
                       "patient_lastname" => $jsonData[$i]['surname'],
                       // "birthday" => $request['birthDayAdd'],
                       "gender" =>$sex,
                       "patient_type" => 1,//opd type
                       "private_docter_id" => $idprivateDoctor,
                       "regis_date" => Carbon::now('Asia/Bangkok'),
                       "id_user" => $user['id_user']
                     ]
                    );
                   $LabOrderImport[$i]['idpatient'] = $pid;
                 }else{
                  $LabOrderImport[$i]['idpatient'] =$patient[0]['id_patient'];
                 }
               }else{
				 if(array_key_exists('idpatient', $jsonData[$i])){
					 $LabOrderImport[$i]['idpatient'] = $jsonData[$i]['id_patient'];
				 }

               }
			   if(array_key_exists('id_doctor', $jsonData[$i])){
				   if($jsonData[$i]['id_doctor']!=null){
					 $LabOrderImport[$i]['iddoctor'] = $jsonData[$i]['id_doctor'];
				   }
			   }
			    if(array_key_exists('id_ward', $jsonData[$i])){
				   if($jsonData[$i]['id_ward']!=null){
					 $LabOrderImport[$i]['idward'] = $jsonData[$i]['id_ward'];
				   }
				}
				 if(array_key_exists('id_hospital', $jsonData[$i])){
				   if($jsonData[$i]['id_hospital']!=null){
					 $LabOrderImport[$i]['idhospital'] = $jsonData[$i]['id_hospital'];
				   }

				}
			  if(array_key_exists('id_sevice_point', $jsonData[$i])){
				   if($jsonData[$i]['id_sevice_point']!=null){
					 $LabOrderImport[$i]['OPDIPD'] = $jsonData[$i]['id_sevice_point'];
				   }
			  }

             }
             // foreach ($LabOrderImport as $key => $value) {
             //   \Log::info('$LabOrderImport['.$key.']',[$value]);
             // }
             foreach($LabOrderImport as $key=>$value){
               $this->AddLabOrderByImportExcel($value);
             }
        }
        return back()->with('success', 'Excel imported');
    }
    public function import_old(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('file')->getRealPath();
        $importData = Excel::load($path, function($reader){})->get();

        // \Log::info([$importData]);
        if($importData->count() > 0){
            // $newdata = json_decode($importData, true);
            foreach($importData as $key => $value){
                // foreach($value as $row){
                    \Log::info('here', [$value]);
                    $insert_data[] = [
                        // 'id_lab_order_main' => $value->id_lab_order_main,
                        'lab_order_no' => $value->lab_order_no,
                        'vn' => $value->vn,
                        'date_ts' => $value->date_ts,
                        'id_department' => $value->id_department,
                        'id_service_plan' => $value->id_service_plan,
                        'id_clinic' => $value->id_clinic,
                        'id_patient' => $value->id_patient,
                        'id_doctor' => $value->id_doctor,
                        'id_sevice_point' => $value->id_sevice_point,
                        'id_user' => $value->id_user,
                        'temperature' => $value->temperature,
                        'bp_low' => $value->bp_low,
                        'bp_high' => $value->bp_high,
                        'pulse' => $value->pulse,
                        'order_date' => $value->order_date,
                        'order_id_user' => $value->order_id_user,
                        'print_barcode_time' => $value->print_barcode_time,
                        'receive_date' => $value->receive_date,
                        'receive_id_user' => $value->receive_id_user,
                        'correct_date' => $value->correct_date,
                        'correct_id_user' => $value->correct_id_user,
                        'id_appointment' => $value->id_appointment,
                        'price' => $value->price,
                        'total_price' => $value->total_price,
                        'discount' => $value->discount,
                        'status' => $value->status,
                        'stdel' => $value->stdel,
                        'id_lab_form' => $value->id_lab_form,
                        'id_ward' => $value->id_ward,
                        'note' => $value->note,
                        'id_hospital_send' => $value->id_hospital_send,
                        'id_hospital' => $value->id_hospital
                    ];
                // }

            }
            if(!empty($insert_data)){
                DB::table('lab_order_main')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel imported');
    }
    public function export(Request $request){
      $limitRow = $request->get('limitRowExport');
	    try{
          $limitInput = $limitRow;//strrpos($limitRow, ",");
				  \Log::Debug('limitRow input',[$limitRow]);

                }
                catch(\Exception $e){
                    // catch code
          }
	  $notWantList =[];
	  //array_push($notWantList,);
	  if($limitInput){
		   try{
			   $limitInput = explode(',',$limitInput);

			  $limitRow = $limitInput[0];
			   //\Log::Debug('limitInput count',[count($limitInput)]);
			  for($i=1;$i<count($limitInput);$i++){
				   try{
				  if(strrpos($limitInput[$i],"-")){
					  $notWant= explode('-',$limitInput[$i]);
					   //\Log::Debug('notWant in if',[$notWant]);
					  for($i=(int)$notWant[0];$i<(int)$notWant[1];$i++){
						  array_push($notWantList,$i);
					  }
					  //\Log::Debug('notWantList in if',[$notWantList]);
				  }else{
					    array_push($notWantList,(int)$limitInput[$i]);
						//\Log::Debug('notWantList in eslse',[(int)$limitInput[$i]]);
				  }
			  }catch(\Exception $ee){
			  }
			  }

		   }catch(\Exception $e){
		   }

	  }
	  //\Log::Debug('notWantList',[$notWantList]);
      $lab_data=[];
      if($limitRow){

        $lab_data = LabOrderMain::with('detail')->with('patient')->where('stdel',0)->where('status','>=',3)->OrderBy('id_lab_order_main','DESC')->limit($limitRow)->get();
      }else{
        $lab_data = LabOrderMain::with('detail')->with('patient')->where('stdel',0)->where('status','>=',3)->OrderBy('id_lab_order_main','DESC')->get();
      }
        //$lab_data = DB::table('lab_order_main')->get()->toArray();
        $lab_array[] = [
            // 'id_lab_order_main' => $value->id_lab_order_main,
            'lab_order_no' ,
			'hn',
			'name',
			'surname',
            // 'vn' ,
			//'order_date',
			//'print_barcode_time',
			//'receive_date',
            //'report_date',
            // 'id_department' ,
            // 'id_service_plan' ,
            // 'id_clinic' ,
            // 'id_patient' ,
            // 'id_doctor' ,
            // 'id_sevice_point' ,
            // 'id_user' ,
            // 'temperature' ,
            // 'bp_low' ,
            // 'bp_high' ,
            // 'pulse' ,
            // 'order_id_user' ,
            // 'receive_id_user',
            // 'correct_date' ,
            // 'correct_id_user' ,
            // 'id_appointment',
            // 'price' ,
            // 'total_price' ,
            // 'discount' ,
            // 'status' ,
            // 'stdel',
            // 'id_lab_form' ,
            // 'id_ward' ,
            // 'note',
            // 'id_hospital_send' ,
            // 'id_hospital'
            // 'ALBUMIN',
            // 'ALBUMIN-MAU',
            // 'ALP-AMP',
            // 'ALT-GPT',
            // 'ANION GAP-SER',
            // 'AST-GOT',
            // 'BILI TOTAL DPD',
            // 'CARBON DIOXIDE',
            // 'CHOL HDL DIRECT',
            // 'CHOL LDL DIRECT',
            // 'CHOLESTEROL',
            // 'Cl-',
            // 'CREATININE ENZ',
            // 'GLUCOSE',
            // 'HBA1C-D%',
            // 'HBA1C-DIR',
            // 'K+',
            // 'Na+',
            // 'PROTEIN TOTALBIR',
            // 'PROTEIN URINE',
            // 'TRIGLYCERIDES',	'UREA-BUN-UV',

        ];

        /*Log::Debug('lab data export',[$lab_data]);
        foreach ($lab_data as $key => $value) {
            Log::Debug('lab data each data:',[$value]);
        }*/
        $AlllabItem = LabItemMaster::orderBy('ordered','ASC')->where('stdel',0)->get();
        $allLabItemArray =[];
        foreach ($AlllabItem as $key => $value) {
          array_push($allLabItemArray,$value->lab_item_code);
         }
         $lab_array=  array_merge($lab_array[0],$allLabItemArray);
         $lab_array = [$lab_array];
        // foreach($lab_array as $index => $val) {
        //   foreach ($AlllabItem as $key => $value) {
        //       $val[$index][$value->lab_item_code] = null;
        //   }
        //
        // }
        //Log::Debug('test-----$lab_array',$lab_array);
		$labNoDigit=9;
        //for($i=count($lab_data)-1;$i>=0;$i--){
		for($i=0;$i<count($lab_data);$i++){
			if(in_array($limitRow-$i,$notWantList)){
				//continue;
        //break;
			}
          $newlabno = substr($lab_data[$i]->lab_order_no,0,$labNoDigit);
          $lab_array[] = [
              // 'id_lab_order_main' => $value->id_lab_order_main,
              'lab_order_no' => $newlabno,
			  'hn'=>$lab_data[$i]['patient']->hn,
			  'name' =>$lab_data[$i]['patient']->patient_firstname,
			  'surname'=>$lab_data[$i]['patient']->patient_lastname,
              // 'vn' => $lab_data[$i]->VN,
			  //'order_date' => $lab_data[$i]->order_date,
			  //'print_barcode_time' => $lab_data[$i]->print_barcode_time,
			  //'receive_date' => $lab_data[$i]->receive_date,
              //'report_date' => $lab_data[$i]->date_ts,
              // 'id_department' => $lab_data[$i]->id_department,
              // 'id_service_plan' => $lab_data[$i]->id_service_plan,
              // 'id_clinic' => $lab_data[$i]->id_clinic,
              // 'id_patient' => $lab_data[$i]->id_patient,
              // 'id_doctor' => $lab_data[$i]->id_doctor,
              // 'id_sevice_point' => $lab_data[$i]->id_sevice_point,
              // 'id_user' => $lab_data[$i]->id_user,
              // 'temperature' => $lab_data[$i]->temperature,
              // 'bp_low' => $lab_data[$i]->bp_low,
              // 'bp_high' => $lab_data[$i]->bp_high,
              // 'pulse' => $lab_data[$i]->pulse,

              // 'order_id_user' => $lab_data[$i]->order_id_user,

              // 'receive_id_user' => $lab_data[$i]->receive_id_user,
              // 'correct_date' => $lab_data[$i]->correct_date,
              // 'correct_id_user' => $lab_data[$i]->correct_id_user,
              // 'id_appointment' => $lab_data[$i]->id_appointment,
              // 'price' => $lab_data[$i]->price,
              // 'total_price' => $lab_data[$i]->total_price,
              // 'discount' => $lab_data[$i]->discount,
              // 'status' => $lab_data[$i]->status,
              // 'stdel' => $lab_data[$i]->stdel,
              // 'id_lab_form' => $lab_data[$i]->id_lab_form,
              // 'id_ward' => $lab_data[$i]->id_ward,
              // 'note' => $lab_data[$i]->note,
              // 'id_hospital_send' => $lab_data[$i]->id_hospital_send,
              // 'id_hospital' => $lab_data[$i]->id_hospital
          ];
         $labItemThatAssign =[];
        foreach($lab_data[$i]['detail'] as $k => $val){
			foreach ($AlllabItem as $key => $value) {

              //$labCode = strtolower($value->lab_item_code);
              if($val->id_lab_item==$value->id_lab_item){
                //if($lab_array[$i][$labCode]==$val->lab_item_code){
                //Log::Info('$lab_array-->',[$lab_array]);
                if($val->lab_result!=null){
				  //Log::Info('$lab_array in match-->',[$value->lab_item_code,$val->lab_result]);
                  $decimal =$value->_decimal;
                  $labResultValue = number_format((float)$val->lab_result,$decimal);
                  $lab_array[$i+1][$value->lab_item_code]=$labResultValue;
				  array_push($labItemThatAssign,$value->lab_item_code);
				  //$lab_array[$i+1]['0001']=2;
				  //$lab_array[$i+1]['0025']=25;
				  //$lab_array[$i+1]['CREATININE_ENZ']=5.4;
				  //$lab_array[$i+1]['\"glucose\"']=35;
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
	$tempHeader = $lab_array[0];
	array_shift($lab_array);
	$lab_array = array_reverse($lab_array);
	array_unshift($lab_array,$tempHeader);
        Excel::create('Lab data', function($excel) use ($lab_array){
            $excel->setTitle('Lab data');
            $excel->sheet('Lab data', function($sheet) use ($lab_array){
				$sheet->freezeFirstRow();
                $sheet->fromArray($lab_array,null,'A1',false,false);
            });
        })->download('xlsx');
    }

    //select Patient,Hospital,Department,Clinic,Doctor,ServicePlan,Ward
    public function DataPatient()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $patient = PatientMaster::with('prefix')->with('nationality')->where('stdel',0)->where('id_hospital',$hospitalID)->orderBy('id_patient','DESC')->get();

        foreach ($patient as $index => $value) {
            # code...
            $dbDate = \Carbon\Carbon::parse($value['birthday']);
            $value['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
        }
        $patient->toArray();
        $data = json_encode(array('data'=>$patient),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataHospital()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataHospital = HospitalMaster::select('*')->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataHospital),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataDepartment()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataDepartment = DepartmentMaster::select('*')->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataDepartment),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataClinic()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataClinic = ClinicMaster::select('*')->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataClinic),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataDoctor()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataDoctor = DoctorMaster::with('hospital')->with('specialty')->with('department')->with('prefix')
        ->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataDoctor),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataServicePlan()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataServicePlan = ServicePlanMaster::select('*')->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataServicePlan),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataWard()
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $DataWard = Ward::select('*')->where('stdel',0)->where('id_hospital',$hospitalID)->get()->toArray();
        $data = json_encode(array('data'=>$DataWard),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    //select Patient,Hospital,Department,Clinic,Doctor,ServicePlan,Ward by id
    public function DataPatientLabOrder(int $id)
    {
        $patient = PatientMaster::with('prefix')->where('id_patient',$id)->get();
        foreach ($patient as $index => $value) {
            # code...
            $dbDate = \Carbon\Carbon::parse($value['birthday']);
            $value['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
            $value['gender'] = $value['gender']  === 1 ? "Male" : "Female";
        }
        $patient->toArray();
        $data = json_encode(array('data'=>$patient),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DataHospitalLabOrder(int $id)
    {
        $DataHospitalLabOrder = HospitalMaster::select('*')->where('id_hospital',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataHospitalLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    /**
     * get all hospital
     * @return josn
     */
    public function getHospital()
    {
        $hospital = HospitalMaster::where('stdel',0)->get();
        return response()->json(['hospital' => $hospital]);
    }

    public function DataDepartmentLabOrder(int $id)
    {
        $DataDepartmentLabOrder = DepartmentMaster::select('*')->where('id_department',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataDepartmentLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataClinicLabOrder(int $id)
    {
        $DataClinicLabOrder = ClinicMaster::select('*')->where('id_clinic',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataClinicLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataDoctorLabOrder(int $id)
    {
        $DataDoctorLabOrder = DoctorMaster::with('hospital')->with('specialty')->with('department')
        ->with('prefix')->where('id_doctor',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataDoctorLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataServicePlanLabOrder(int $id)
    {
        $DataServicePlanLabOrder = ServicePlanMaster::select('*')->where('id_service_plan',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataServicePlanLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DataWardLabOrder(int $id)
    {
        $DataWardLabOrder = Ward::select('*')->where('id_ward',$id)->get()->toArray();
        $data = json_encode(array('data'=>$DataWardLabOrder),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function RejectSpeciment(int $id)
    {

        $RejectSpeciment = RejectSpecimentNote::select('*')->where('stdel',0)->get()->toArray();
        //dd($RejectSpeciment);
        $data = json_encode(array('data'=>$RejectSpeciment),JSON_UNESCAPED_UNICODE);
        return $data;
    }


    //select LabSubGroupItem
    public function LabSubGroupItem()
    {
        $user = session('user')->toArray();
        $LabSubGroupItem = LabSubGroupItemMaster::select('*')->where('stdel',0)->where('id_hospital',$user['id_hospital'])->get()->toArray();
        $data = json_encode(array('data'=>$LabSubGroupItem),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    //select data LabSubGroupItem
    public function SelectLabSubGroupItem(string $datalab)
    {
        $labResult = LabItemMaster::leftJoin('lab_sub_group_item_master as labsub','labsub.id_lab_sub_group_item','=','lab_item_master.id_lab_item_sub_group')
        ->where('labsub.lab_sub_group_name',$datalab)->where('labsub.stdel',0)
        ->where('lab_item_master.stdel',0)->orderBy('lab_item_master.ordered','ASC')->get()->toArray();
        $data = json_encode(array('data'=>$labResult),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function SelectLabSubGroupItemById(int $datalab)
    {
        $labResult = LabItemMaster::leftJoin('lab_sub_group_item_master as labsub','labsub.id_lab_sub_group_item','=','lab_item_master.id_lab_item_sub_group')
        ->where('labsub.id_lab_sub_group_item',$datalab)->where('labsub.stdel',0)
        ->where('lab_item_master.stdel',0)->orderBy('lab_item_master.ordered','ASC')->get()->toArray();
        $data = json_encode(array('data'=>$labResult),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function GetSpecimenById(int $id){
      $item_specimen = LabSpecimenItem::select('*')->where('id_lab_specimen_item',$id)->get();
      return response()->json(['data' => $item_specimen]);
    }

    //insert LabOrderMain
    public function AddLabOrder(Request $request)
    {
        $user = session('user')->toArray();
        $hospitalID = $user['id_hospital'];
        $userID = $user['id_user'];
        $request = $request->all();
        Log::Debug('AddLab Request',$request);
        $labItemList = $request['lab_item_selected'];
        $barcodeType = array();//keep specimen type
        $startCode = "S";//for edit started barcode S is ser U is Urine W is Whole Blood
        $testStartCode = array();
		    $removeChar = array();
		    $allLabSpecimen = LabSpecimenItem::select('*')->where('stdel',0)->get();
        foreach ($allLabSpecimen as $key => $value) {
          array_push($removeChar,substr($value->lab_specimen_item_code, 0, 1)."1");
        }
        foreach ($labItemList as $key => $value) {//loop check specimen each lab item
          $item_specimen = LabItemMaster::select('*')->where('id_lab_item',$value)->with('specimen')->get()->toArray();
          $specimenCode = $item_specimen[0]['specimen']['lab_specimen_item_code'];
          if(!array_key_exists($specimenCode,$barcodeType)){
            $barcodeType[$specimenCode] = array();//key is Specimen type such as SER URI WBL if none then new array
          }
        array_push($barcodeType[$specimenCode],$value);//push id lab item to specimen
		     array_push($removeChar,substr($specimenCode, 0, 1)."1");
        }
        $num_lab_barcode=0;//counter lab order main num
        $lab_main_id = array();//for hold id_lab_order_main that is from specimen type
        //$removeChar = array("S1","U1","W1");//for remove header start barcode for counter lab no.
        foreach ($barcodeType as $key => $value) {//loop insert new Lab no. per specimen type if havve 1 insert 1 record if have 2(such as SER ,URI) insert 2 record
            $num_lab_barcode = count($barcodeType[$key])>0?$num_lab_barcode+1:$num_lab_barcode;
            if(!array_key_exists($key,$lab_main_id)){
              $lab_main_id[$key] =0;//init data id
            }
            if($key!=""){
              $startCode = substr($key, 0, 1);
              array_push($removeChar,$startCode."1");
              array_push($testStartCode,$startCode);
            }else{
              $startCode = "S";
              array_push($removeChar,$startCode."1");
              array_push($testStartCode,$startCode);
            }
            if($request['idpatient']!=null){
                $labno = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->get()->toArray();
                $dataMain = null;
                $barcodeTotalDigit = 20;
                $labNoDigit = 7;//num of digit after S to E
                $StartChar=$startCode."1";//change S to S1 for startChar
    			      $EndChar = "";
                if(count($labno) > 0){
    				        $newlabno = $labno[0]['lab_order_no'];
                    foreach ($removeChar as $value){

                      $newlabno = str_replace($value,"",$newlabno);
                    }
    				        $newlabno = substr($newlabno,0,$labNoDigit);
                    //this is for BA200 Issue
                    //format barcode 20 digit to S0000000E00000000 barcode is between S and E,After E is Mock value 0 to have 20 digit

					//\Log::Debug("newlabno",[$newlabno]);
                    $newlabno = $newlabno + 1;
                    $newlabno = str_pad($newlabno, $labNoDigit, '0', STR_PAD_LEFT);
                    $newlabno = str_pad($newlabno, $labNoDigit+strlen($StartChar), $StartChar, STR_PAD_LEFT);
                    $newlabno .= $EndChar;
                    $newlabno = str_pad($newlabno, $barcodeTotalDigit, '0', STR_PAD_RIGHT);
                    $dataMain = LabOrderMain::insert([
                        'lab_order_no'=>$newlabno,
                        'id_department'=>$request['iddepartment'],
                        'id_service_plan'=>$request['idservice_plan'],
                        'id_clinic'=>$request['idclinic'],
                        'id_patient'=>$request['idpatient'],
                        'id_doctor'=>$request['iddoctor'],
                        'id_ward'=>$request['idward'],
                        'id_hospital_send'=>$request['idhospital'],
                        'id_sevice_point'=>$request['OPDIPD'],
                        'order_date'=> Carbon::now('Asia/Bangkok'),
                        'id_hospital'=>$hospitalID,
                        'id_user'=>$userID,
                        'order_id_user' => $userID
                    ]);
                }else{
                    $newlabno = str_pad(1, $labNoDigit, '0', STR_PAD_LEFT);
                    $newlabno = str_pad($newlabno, $labNoDigit+strlen($StartChar), $StartChar, STR_PAD_LEFT);
                    $newlabno .= $EndChar;
                    $newlabno = str_pad($newlabno, $barcodeTotalDigit, '0', STR_PAD_RIGHT);
                    $dataMain = LabOrderMain::insert([
                        'lab_order_no'=>$newlabno,
                        'id_department'=>$request['iddepartment'],
                        'id_service_plan'=>$request['idservice_plan'],
                        'id_clinic'=>$request['idclinic'],
                        'id_patient'=>$request['idpatient'],
                        'id_doctor'=>$request['iddoctor'],
                        'id_ward'=>$request['idward'],
                        'id_hospital_send'=>$request['idhospital'],
                        'id_sevice_point'=>$request['OPDIPD'],
                        'order_date'=>Carbon::now('Asia/Bangkok'),
                        'id_hospital'=>$hospitalID,
                        'id_user'=>$userID ,
                        'order_id_user' => $userID
                    ]);
                }

            }
        }

        $testData = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->limit($num_lab_barcode)->get()->toArray();//select last insert lab order main
        $index_lab_order = $num_lab_barcode-1;//for reverse
        foreach ($barcodeType as $key => $value) {
          if($index_lab_order<=0) {$index_lab_order=0;}
          if(count($barcodeType[$key])>0){
            if($lab_main_id[$key]==0){
              $lab_main_id[$key] = $testData[$index_lab_order]['id_lab_order_main'];
              $index_lab_order--;
              continue;
            }
          }
        }
        //maping id lab order main and lab item id return json for add lab item detail
        $dataPairLabMainIdAndItemId = array();
        $indexRun = 0;
        foreach ($barcodeType as $keySpecimen => $valueLabItem) {
          foreach ($valueLabItem as $key => $value) {
            if(array_keys($lab_main_id)[$indexRun]==$keySpecimen){
              if(!array_key_exists($value,$dataPairLabMainIdAndItemId)){
                $dataPairLabMainIdAndItemId[$value] = array();
              }
              $dataPairLabMainIdAndItemId[$value] = $lab_main_id[$keySpecimen];
            }
          }
          $indexRun++;
        }
        //-------------------------------------------------------------------------

        return response()->json(['success'=>true,'data' => $barcodeType,'num_lab_barcode'=>$num_lab_barcode,'lab_main_id'=>$lab_main_id,'testData'=>$testData,'mapIdMainAndLabId'=>$dataPairLabMainIdAndItemId]);
        //Log::Debug('AddLab specimen',$test);

    }
    public function RecieveEditLabOrderDetail(int $labOrderID){
        $labEdit = LabOrderMain::select('*')->with('detail')->where('id_lab_order_main',$labOrderID)->get()->toArray();
        $patient = PatientMaster::select('*')->with('prefix')->where('id_patient',$labEdit[0]['id_patient'])->get();
        foreach ($patient as $index => $value) {
            # code...
            $dbDate = \Carbon\Carbon::parse($value['birthday']);
            $value['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
            $value['gender'] = $value['gender']  === 1 ? "Male" : "Female";
        }
        $patient->toArray();
        $labitemGroup = LabItemMaster::select('*')->with('subGroup')->where('id_lab_item',$labEdit[0]['detail'][0]['id_lab_item'])->get()->toArray();
        $hospital = HospitalMaster::select('*')->where('id_hospital',$labEdit[0]['id_hospital'])->get()->toArray();
        $clinic = ClinicMaster::select('*')->where('id_clinic',$labEdit[0]['id_clinic'])->get()->toArray();
        $department = DepartmentMaster::select('*')->where('id_department',$labEdit[0]['id_department'])->get()->toArray();
        $servicePlan = ServicePlanMaster::select('*')->where('id_service_plan',$labEdit[0]['id_service_plan'])->get()->toArray();
        $doctor = DoctorMaster::select('*')->with('hospital')->with('specialty')->with('department')->with('prefix')->where('id_hospital',$labEdit[0]['id_hospital'])->where('id_doctor',$labEdit[0]['id_doctor'])->get()->toArray();
        $ward = Ward::select('*')->where('stdel',0)->where('id_hospital',$labEdit[0]['id_hospital'])->where('id_ward',$labEdit[0]['id_ward'])->get()->toArray();
        $data['labEdit'] = $labEdit;
        $data['labitemGroup'] = $labitemGroup;
        $data['patient'] = $patient;
        $data['hospital'] = $hospital;
        $data['clinic'] = $clinic;
        $data['department'] = $department;
        $data['servicePlan'] = $servicePlan;
        $data['doctor'] = $doctor;
        $data['ward'] = $ward;
        return response()->json(['data' => $data]);
    }
    public function EditLabOrderDetail(Request $request){
      $request = $request->all();
      //Log::debug('EditLabOrderDetail Request:2',$request);
      $datavalue = $request['Data'];//each lab item master id
      $datauser = session('user');
      $idlab = $request['id_lab_order_main'];
      $datalab = LabOrderDetail::select('*')->where('id_lab_order_main',$idlab)->get()->toArray();
      //Log::debug('EditLabOrderDetail datalab',$datalab);
      /*foreach($datalab as $key => $val){
        LabOrderDetail::where('id_lab_order_detail',$val['id_lab_order_detail'])->delete();
      }
      foreach($datavalue as $key => $val){
          $dataDetail = LabOrderDetail::insert([
              'id_lab_order_main'=>$idlab,
              'id_lab_item'=>$val
          ]);
      }*/

      $DataInDBCount = count($datalab);
      $DataPostCount = count($datavalue);
      if($DataInDBCount>=$DataPostCount){

        //Log::debug('EditLabOrderDetail $intersect',$intersect);
        for ($i=0;$i<count($datalab);$i++) {
          for($j=0;$j<count($datavalue);$j++){
              $dataDetail = LabOrderDetail::where('id_lab_order_detail',$datalab[$j]['id_lab_order_detail'])->update([
                'id_lab_item'=>$datavalue[$j],
                'status'=>$datalab[$j]['status']
            ]);

          }
          if($i>=count($datavalue)){
            LabOrderDetail::where('id_lab_order_detail',$datalab[$i]['id_lab_order_detail'])->delete();
          }

        }
      }else{
        for ($i=0;$i<count($datavalue);$i++) {
          $status=0;
          for($j=0;$j<count($datalab);$j++){
              $dataDetail = LabOrderDetail::where('id_lab_order_detail',$datalab[$j]['id_lab_order_detail'])->update([
                'id_lab_item'=>$datavalue[$j],
                'status'=>$datalab[$j]['status']
            ]);
              $status = $datalab[$j]['status'];
          }
          if($i>=count($datalab)){
            $dataDetail = LabOrderDetail::insert([
                'id_lab_order_main'=>$idlab,
                'id_lab_item'=>$datavalue[$i],
                'status'=>$status
            ]);
          }
        }

      }
        return response()->json(['success' => true, 'data' =>$datavalue]);
    }
    public function EditLabOrder(Request $request){
      $request = $request->all();
      //Log::debug('EditLabOrder Request:1',$request);
      $data = LabOrderMain::where('id_lab_order_main', $request['id_lab_order_main'])->update([
          'id_hospital' => $request['idhospital'],
          'id_department' =>$request['iddepartment'],
          'id_service_plan' => $request['idservice_plan'],
          'id_clinic' =>$request['idclinic'],
          'id_doctor' => $request['iddoctor'],
          'id_ward' =>$request['idward'],
          'id_sevice_point' =>$request['OPDIPD'],
      ]);
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function AddLabOrderDetail(Request $request)
    {
        $request = $request->all();
        $datavalue = $request['Data'];
        $num_lab_barcode  = $request['num_lab_barcode'];
        $lab_main_id_array = $request['lab_main_id'];
        $lab_item_id_array = $request['lab_item_id'];
        $mapIdMainAndLabId_array = $request['mapIdMainAndLabId'];
        $datauser = session('user');
        /*$datalab = LabOrderMain::select('*')->orderBy('id_lab_order_main','DESC')->limit($num_lab_barcode)->get()->toArray();
        $idlab = $datalab[0]['id_lab_order_main'];*/

        foreach ($mapIdMainAndLabId_array as $key => $value) {
          $dataDetail = LabOrderDetail::insert([
              'id_lab_order_main'=>$value,
              'id_lab_item'=>$key
          ]);
        }
        return response()->json(['success' => true,'lab_main_id_array'=>$lab_main_id_array,'lab_item_id_array'=>$lab_item_id_array]);
        /*foreach($datavalue as $key => $val){
            $dataDetail = LabOrderDetail::insert([
                'id_lab_order_main'=>$idlab,
                'id_lab_item'=>$val
            ]);
        }

        return response()->json(['success' => true, 'data' => $dataDetail]);*/
    }

    public function SelectLabOrderMain()
    {
        $lab = LabOrderMain::with(['appoint' => function($q){
            $q->orderBy('id_appointment','DESC');
        }])->with(['patient' => function($q){
            $q->with('prefix');
        }])->with('detail')->orderBy('id_lab_order_main','DESC')->where('stdel',0)->get();

        foreach ($lab as $key => $value) {
            # code...
            if($value['date_ts']){
                $value['date_ts'] = Carbon::parse($value['date_ts'])->format('H:i:s');
            }
        }
        $lab->toArray();
        $data = json_encode(array('data'=>$lab),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    /**
     * #########################
     * select lab order
     * ########################
     */
    public function getLabOrder(Request $request){

        $hn  = $request->input('hn');
        $labNo  = $request->input('labNo');

        $result = LabOrderMain::
        with(['appoint' => function($q){
            $q->orderBy('id_appointment','DESC');
        }])->with(['patient' => function($q){
            $q->with('prefix');
        }])->join('patient_master','patient_master.id_patient','=','lab_order_main.id_patient')
        ->where('lab_order_main.stdel',0)->orderBy('id_lab_order_main','DESC');

        if($request->has('dateS') && $request->input('dateS') != ""){
            $dateStart  = date('Y-m-d',strtotime($request->input('dateS')));
            $result->where('order_date','>=',$dateStart.' 00:00:00');
        }
        if($request->has('dateEnd') && $request->input('dateEnd') != ""){
            $dateEnd  = date('Y-m-d',strtotime($request->input('dateEnd')));
            $result->where('order_date','<=',$dateEnd.' 23:59:00');
        }
        if($request->has('hn')){
            $result->where('patient_master.hn','like', '%' .$hn. '%');
        }
        if($request->has('labNo')){
            $result->where('lab_order_no','like', '%' .$labNo. '%');
        }
        $result = $result->get()->toArray();
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabOrderMainByDate(Request $request){

        $newdate1  = date('d-m-Y',strtotime($request->input('dateS')));
        $newdate2  = date('d-m-Y',strtotime($request->input('dateE')));

        $result = VLabOrderMain::where('stdel',0)
        ->where(DB::raw("BETWEEN"+ $newdate1 + "AND"+ $newdate2))
        ->get()->toArray();

        //->whereBetween("order_date",[$newdate1,$newdate2])
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function ReceiveLabOrder(int $subid)
    {
        $user = session('user');
        $result = LabOrderMain::where('id_lab_order_main',$subid)->update([
            'status'=>1,
            'receive_date' => Carbon::now('Asia/Bangkok'),
            'receive_id_user' => $user['id_user']
        ]);

        $labitem = LabOrderDetail::where('id_lab_order_main',$subid)->get();
        foreach ($labitem as $key => $value) {
            # code...
            LabOrderDetail::where('id_lab_order_main', $value->id_lab_order_main)->update([
                "status" => 1
            ]);
        }

        return response()->json(['success' => true]);
    }
    public function UpdateBarcodeTime(int $orderId,Carbon $printTime)
    {
      $user = session('user');
      $result = false;
      if($printTime!=null){
        $result = LabOrderMain::where('id_lab_order_main',$orderId)
        ->where('receive_date',NULL)
        ->where('print_barcode_time',NULL)
        ->update([
            'print_barcode_time' => $printTime,
        ]);
      }else{
        $result = LabOrderMain::where('id_lab_order_main',$orderId)
        ->where('receive_date',NULL)
        ->where('print_barcode_time',NULL)
        ->update([
            'print_barcode_time' => Carbon::now('Asia/Bangkok'),
        ]);
      }
        return response()->json(['success' => $result]);
    }
    public function ReceiveLabOrderByBarcode(string $barcode)
    {
      $user = session('user');
      $labOrderMainId = LabOrderMain::select('id_lab_order_main','receive_date','print_barcode_time')->where('lab_order_no',$barcode)->first();
      $success = false;
      if($labOrderMainId->receive_date==null&&$labOrderMainId->print_barcode_time!=null){
        $success = self::ReceiveLabOrder($labOrderMainId->id_lab_order_main);
      }
      //return response()->json(["success"=>true,'id'=>$labOrderMainId]);
      return response()->json(['success' => $success]);
    }

    public function DeleteLabOrder(int $subid)
    {
        $data = LabOrderMain::where('id_lab_order_main',$subid)->update(
            [
                'stdel'=>1
            ]
        );
        if($data)
        {
            $result = 1;
        }
        else
        {
            $result = 0;
        }
        return $result;
    }
    public function SelectIDLabOrderMain(int $subid)
    {
            $RejectSpecimentList = VSpecimentRejectList::where('id_specimen_item',$subid)->get()->toArray();
            if($RejectSpecimentList == []){
                return ;
            }
            $newarray = $RejectSpecimentList[0];
            $Newspecimen_item = [];
            $allRej = [];

                $dataRej = [];
                foreach($RejectSpecimentList as $key => $val) {
                    $dataRej['item'][] = $val['specimen_item_reject_note'];
                }
                $newarray = array_merge($newarray,$dataRej);
            $data = json_encode(array('data'=>$newarray),JSON_UNESCAPED_UNICODE);
            return $data;

    }

    public function SelectIDLabOrderMainPatiant(int $subid)
    {
       $Vlaborder =  LabOrderMain::with(['patient' => function($q){
           $q->with('prefix');
       }])
       ->with(['doctor'=> function($qd){
         $qd->with('prefix');
       }])
       ->where('id_lab_order_main',$subid)->get();
       foreach ($Vlaborder as $index => $value) {
            # code...
            $dbDate = \Carbon\Carbon::parse($value->patient['birthday']);
            $value->patient['age'] = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
        }

       $Vlaborder->toArray();
       $data = json_encode(array('data'=>$Vlaborder),JSON_UNESCAPED_UNICODE);
            return $data;
    }
    public function SelectDataForAppointmentByLabOrderMainID(int $labOrderId){
      $labOrderPatientResult =  self::SelectIDLabOrderMainPatiant($labOrderId);

    }
    public function GetAppointmentById(int $id)
    {
      $success = false;
      $result = AppointmentOrderData::where('id_appointment',$id)->first();
      if($result!=null){
        $success = true;
      }
      return response()->json(['success'=>$success,'data'=>$result]);
    }
    public function SaveAppointment(Request $request)
    {
        $request = $request->All();
        $datetime = $request['datepicker'];
        $time1 =$request['Hr'];
        $time2 =$request['Minute'];
        $allTime =$datetime." ".$time1.":".$time2.":00";
        $user = session('user');
        $newtime = Carbon::parse( $allTime )->format('Y-m-d H:i:s');
        AppointmentOrderData::insert([
                'id_doctor'=>$request['id_doctor'],
                'date_order'=>$newtime,
                'id_lab_order_main'=>$request['id_lab_order_main'],
                'appointment_for'=>$request['appointmentfor'],
                'note'=>$request['note'],
                'id_user_ts' => $user['id_user']
        ]);

        $result = AppointmentOrderData::orderBy("id_appointment", 'DESC')->first();
        LabOrderMain::where('id_lab_order_main', $request['id_lab_order_main'])->update([
            'id_appointment' => $result['id_appointment']
        ]);

        return redirect()->back();
    }
    public function SaveRejectSpeciment(Request $request)
    {
        $user = session('user');
        $request = $request->all();
        foreach($request['allItem'] as $val){
            RejectSpecimentOrder::insert(
            [
                    'id_specimen_item'=>$request['id'],
                    'id_specimen_item_reject_note'=>$val,
                    'specimen_item_reject_date'=> Carbon::now('Asia/Bangkok')->format('Y-m-d H:i:s'),
                    'id_username'=>$user['id_user']
            ]);
        }
        return "success";
    }

    public function BarcodeGen (Request $request)
    {

        $request = $request->all();
		//$numOfCols = 2;
		$rowCount = 0;
		//$bootstrapColWidth = 12 / $numOfCols;
		echo '<body style="padding-top:1px; margin: 0px !important;">';
		echo '<table>';
        foreach ($request as $key => $value) {
            # code...
            if($key != "_token"){
                $item = json_decode($value);

                $barcodes = LabOrderMain::leftJoin('department_master as department','department.id_department','=','lab_order_main.id_department')
                ->with('hospital')->with(['patient' => function($q){
                    $q->with('prefix');
                }])
                ->with('detail')
                ->where('id_lab_order_main',$item->id)->get()->toArray();
                //return response()->json(['barcode'=>$barcodes]);
                $printTime =  null;
                try{
                  $printTime =  \Carbon\Carbon::parse($barcodes[0]['print_barcode_time']);
                }catch(Exception $ex){

                }
                $dbDate = \Carbon\Carbon::parse( $barcodes[0]['patient']['birthday']);
                $diffYears = \Carbon\Carbon::now('Asia/Bangkok')->diffInYears($dbDate);
                $hospital_name = $barcodes[0]['hospital'][0]['hospital_name'];
				        $hn_patient = $barcodes[0]['patient']['hn'];
                $prefix_name = $barcodes[0]['patient']['prefix']['prefix_name'];
                $patient_firstname = $barcodes[0]['patient']['patient_firstname'];
                $patient_lastname = $barcodes[0]['patient']['patient_lastname'];
                $gender = $barcodes[0]['patient']['gender'] === 1 ? "Male" : "Female";
                $age = $diffYears;
                $hospital_name = $barcodes[0]['hospital'][0]['hospital_name'];
                $department_name = $barcodes[0]['department_name'];
                $detail = $barcodes[0]['detail'];
                
                $labItemNameList = array();
                for($i = 0;$i<count($detail);$i++){
                  $labItemName = LabItemMaster::where('id_lab_item',$detail[$i]['id_lab_item'])->orderBy('ordered')->get()->toArray();
                  array_push($labItemNameList, $labItemName[0]['eng_name']);
                }

                \Log::info('barcode', [$labItemNameList]);
                $barcode = new BarcodeGenerator();
                //$barcode->setText("1".strval($item->barcode));
				$barcode->setText($item->barcode);
				//$barcode->setText("000001");
				//$barcode->setText("901125658589654");
				$barcode->setType(BarcodeGenerator::Code128);

				//$barcode->setType(BarcodeGenerator::Ean128);
				//$barcode->setType(BarcodeGenerator::Code39);
				$barcodenum = $item->barcode;
				$subbarcodenum = substr($barcodenum,0,9);
                $barcode->setScale(2);
                $barcode->setThickness(18);
				$barcode->setLabel("");//for remove label
                //$barcode->setFontSize(8);
                $code = $barcode->generate();
				$fix_laname = substr($patient_lastname,0,20);
                $codeblank = '';


				// if($rowCount % $numOfCols == 0){echo '<tr>';}
				// echo '<td>';

        //         //echo '<img src="data:image/png;base64,'.$code.'" style="width:171px; height:55px;" /> <br>';
				// echo '<img src="data:image/png;base64,'.$code.'" style="width:171px; height:41px; margin-top:3px;" /> <br>';
				// echo '<p style="font-size:8.5px; padding:0px; margin:1px;">HN '.$hn_patient.' &nbsp&nbsp&nbsp '.$item->barcode.'</p>';
        //         echo '<p style="font-size:8.5px; padding:0px; margin:1px;">'.$prefix_name.' '.$patient_firstname.' '.$patient_lastname.'</p>';
        //         if($printTime==null){
        //           $printTime = Carbon::now('Asia/Bangkok');
        //           echo '<p style="font-size:8.5px; padding:0px; margin:1px;"> อายุ '.$age.' ปี '.'P_Time:'.$printTime->format('Y-m-d H:i:s').' </p>' ;
        //       }else{
        //         echo '<p style="font-size:8.5px; padding:0px; margin:1px;"> อายุ '.$age.' ปี '.'P_Time:'.$printTime->format('Y-m-d H:i:s').' </p>' ;
        //       }
        // echo '</td>';
       // if($rowCount % $numOfCols == 0){echo '<tr>';}
		
				echo '<tr style="bottom:0px !important;">';
				 echo '<td style="bottom:0px !important;">';
				
                    //echo '<img src="data:image/png;base64,'.$code.'" style="width:171px; height:55px;" /> <br>';
					//echo '<p style="font-size:8.5px; padding:0px; margin:1px;">HN '.$hn_patient.' &nbsp&nbsp&nbsp '.$item->barcode.'</p>';
				  if($printTime==null){
                   $printTime = Carbon::now('Asia/Bangkok');
                   echo '<p style="font-size:8.5px; padding:0px; margin:0px; margin-top:4px;">HN '.$hn_patient.' &nbsp&nbsp&nbsp '.$subbarcodenum.''.$printTime->format('Y/m/d H:i').' </p>' ;
                  }else{
                    echo '<p style="font-size:8.0px; padding:0px; margin:0px; margin-top:4px;">HN '.$hn_patient.' &nbsp&nbsp&nbsp '.$subbarcodenum.' '.$printTime->format('Y/m/d H:i').' </p>' ;
                  }
				  echo '<p style="font-size:9px; font-weight: bold; padding:0px; margin:0px;">'.$prefix_name.' '.$patient_firstname.' '.$fix_laname.'<b style="float: right;">'.$age.' ปี </b></p>';
				  echo '<img src="data:image/png;base64,'.$code.'" style="width:171px; height:31px; margin-top:1px;" /> <br>';
				  echo '<span style="font-size:8.5px; padding:0px; margin:0px;">'.$department_name.' </span>';
                  
                  if(count($labItemNameList)<4){
                    for($i = 0;$i<count($labItemNameList);$i++){
                     echo '<span style="font-size:8.5px; padding:0px;  margin: 0px 1px;">'. $labItemNameList[$i],' | ' .' </span>';
                    }
                  }else{
                     echo '<span style="font-size:8.5px; padding:0px; margin: 0px 1px;">'.$labItemNameList[0],' | ', $labItemNameList[1],' | ', $labItemNameList[2],' | ', $labItemNameList[3].' </span>';
                  }
				 echo '</td>';
                echo '</tr>';
         
			 // $rowCount++;
			 // if($rowCount % $numOfCols == 0) {echo '</tr>';}

                //echo '<p style="font-size:10px; padding:0px; margin:1px;" style=" width: 100%;height: 66px;"> '.$hospital_name.' </p>' ;
                //update barcode times
                try {
                  self::UpdateBarcodeTime($item->id,$printTime);
                }
                 catch (Exception $e) {
                }

            }
        }
	echo '</table>';
	echo'</body>';
    }


}
