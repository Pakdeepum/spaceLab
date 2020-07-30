<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VLabOrderMain;
use App\VLabOrderDetail;
use App\LabOrderDetail;
use App\LabOrderMain;
use App\LabOrderItem;
use App\LabItemMaster;
use App\LabItemTypeMaster;
use App\LabSpecimenItem;
use App\AppointmentOrderData;
use App\Cancel;
use Carbon\Carbon;
use App\LabHistory;
use App\Critical;
use App\UserMaster;
use App\DistrictMaster;
use App\AmphurMaster;
use App\ProvinceMaster;
use App\PatientMaster;
use App\DoctorMaster;
use App\HospitalMaster;
use App\LabRequest;
use App\Ward;
use App\LabSubGroupItemMaster;
use JasperPHP\JasperPHP;
use PDF;
use DB;
use File;
use Log;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function test()
    {
        // echo "Test";
        // DB::table('lab_num')->where('id_num', 1)->update(['lab_request_id' => 23]);
        $lab_num = DB::connection('mysql')->select('select * from lab_num where id_num = 1');
        $lab_request_id = $lab_num[0]->lab_request_id;
        $labRequest = DB::connection('mysql2')->select("select * from lab_request where lab_request_id > $lab_request_id");
        $i = 0;
        // print_r ($labRequest);

        
        foreach($labRequest as $key => $value){
            $request_id[$i]               = $value->lab_request_id;
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


            // $checkLabOrderNo = LabOrderMain::select('lab_order_no')->where('lab_order_no',$requestLon[$i])->get()->toArray();
            // print_r($requestLon[$i]);
            // echo "<br>";
            // if($checkLabOrderNo == null){
            //     echo "testtt<br>";
            // print_r($request_data[$i]);
            echo "<hr>";
                $str =  iconv('TIS-620','UTF-8',$request_data[$i] );
                // $str =  iconv('windows-1251','UTF-8',$request_data[$i] );
                // $str =  iconv("UTF-8","ISO-8859-1//TRANSLIT",$request_data[$i]);
                // $str =  iconv("UTF-8","ISO-8859-1//IGNORE",$request_data[$i]);
                // $str =  iconv("UTF-8","ISO-8859-1",$request_data[$i]);
                echo $str;
                echo "<hr>";
                $data_request[$i] = explode("|", iconv('TIS-620','UTF-8',$request_data[$i] ));
                $data_MSH[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"MSH"));
                $data_PID[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"PID"));
                $data_PV1[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"PV1"));
                $data_ORC[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"ORC"));
                $data_OBR[$i] = explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR")); 

                // $test2 =  strchr(iconv('TIS-620','UTF-8',$test ),"OBR");
                // foreach ($data_OBR[$i] as $key => $value){
                //     print_r($value);
                //     echo "|";
                // }
                // print_r($data_request[$i]);
                // echo $data_MSH[$i][9];
                echo 'PID<br>';
                print_r($data_PID[$i]);
                echo '<hr>PV1<br>';
                print_r($data_PV1[$i]);
                echo '<hr>ORC<br>';
                print_r($data_ORC[$i]);
                echo '<hr>OBR<br>';
                print_r($data_OBR[$i]);
                echo '<hr>';
                if(count($data_request[$i]) > 26){
                    // echo "testtt2<br>";
                    $doctor[$i] = explode("^", $data_PV1[$i][7]);
                    $id_docter = $doctor[$i][0];
                    $id_fullname = $doctor[$i][1];
                    $id_fullname = explode(" ", $id_fullname);
                    // echo 'id_fullname -> ';
                    // print_r($id_fullname);
                    $doctor_name = $id_fullname[0];
                    // echo '----'.count($id_fullname);
                    if (count($id_fullname) > 1){
                        $doctor_lastname = $id_fullname[1];
                    }else {
                        $doctor_lastname = null;
                    }

                    $MAX_idpatient = DB::table('patient_master')->max('id_patient');
                    $id_patient = $MAX_idpatient+1;
                    // echo "table lab_order_main <br><br>";
                    // echo "id_lab_order_main         => " . 'null';
                    // echo "<br> lab_order_no         => " . $requestLon[$i];
                    // echo "<br> VN                   => " . '(null)';
                    // echo "<br> date_ts              => " . '(null)';
                    // echo "<br> id_department        => " . 5;
                    // echo "<br> id_service_plan      => " . $data_PV1[$i][10];
                    // echo "<br> id_clinic            => " . $data_OBR[$i][13];
                    // echo "<br> id_patient           => " . $id_patient;
                    // echo "<br> id_doctor            => " . $id_docter;
                    // echo "<br> id_sevice_point      => " . 1;
                    // echo "<br> id_user              => " . 1;
                    // echo "<br> temperature          => " . '(null)';
                    // echo "<br> bp_low               => " . '(null)';
                    // echo "<br> bp_high              => " . '(null)';
                    // echo "<br> pulse                => " . '(null)';
                    // echo "<br> order_date           => " . date("Y-m-d H:i:s");
                    // echo "<br> order_id_user        => " . 1;
                    // echo "<br> print_barcode_time   => " . '(null)';
                    // echo "<br> receive_date         => " . $data_ORC[$i][9];
                    // echo "<br> receive_id_user      => " . '(null)';
                    // echo "<br> correct_date         => " . '(null)';
                    // echo "<br> correct_id_user      => " . '(null)';
                    // echo "<br> id_appointment       => " . '(null)';
                    // echo "<br> price                => " . '(null)';
                    // echo "<br> total_price          => " . '(null)';
                    // echo "<br> discount             => " . '(null)';
                    // echo "<br> status               => " . 0;
                    // echo "<br> stdel                => " . 0;
                    // echo "<br> id_lab_form          => " . '(null)';
                    // echo "<br> id_ward              => " . $data_PV1[$i][11]; 
                    // echo "<br> note                 => " . '(null)';
                    // echo "<br> id_hospital_send     => " . 1;
                    // echo "<br> id_hospital          => " . $data_PV1[$i][10];

                    $MAX_lab_order = DB::table('lab_order_main')->max('id_lab_order_main');
                    $MAX_LabOrderMain = VLabOrderMain::select('lab_order_no', 'id_lab_order_main')->where('id_lab_order_main',$MAX_lab_order)->get()->toArray();
                    foreach($MAX_LabOrderMain as $key => $value){
                        // echo $value->lab_order_no;
                        $max_id_order_main = $value['id_lab_order_main'];
                        $id_order_main = $max_id_order_main++;
                        // echo $max_id_order_main;
                        // echo "<br>";
                        // echo $value['lab_order_no'];
                        // echo "<hr>";
                        $substr_lab_order_no = substr($value['lab_order_no'],1,8);
                        $substr_to_int = intval($substr_lab_order_no);
                        $substr_to_int++;
                        $new_lab_order_no = 'H'.$substr_to_int;
                        echo 'new_lab_order_no'.$new_lab_order_no;
                    }
                    // echo "<hr>";
                    // echo "id_clinic =>".$data_OBR[$i][13];
                    if ($data_OBR[$i][13] == null){
                        // echo "id_clinic == null";
                        $id_clinic = 4;
                    }else {
                        $id_clinic = $data_OBR[$i][13];
                    }
                    // echo "<hr>";
                    print_r ($data_PV1[$i][11]);
                    $sub_ward[$i] = explode("^", $data_PV1[$i][11]);
                    if (count($sub_ward[$i])>=2){
                        $ward_code = $sub_ward[$i][0];
                        $ward_name = $sub_ward[$i][1];
                        $count_id_ward = count(Ward::select('id_ward')->where('ward_code',$ward_code)->get());
                        if ($count_id_ward == 0){
                            Ward::insert([
                                "id_ward" => null,
                                "ward_name" => $ward_name,
                                "ward_code" => $ward_code,
                                "id_hospital" => 1,
                                "stdel" => 0
                            ]);
                        }
                    
                        $ward = Ward::select('*')->where('ward_code',$ward_code)->get()->toArray();
                        $id_ward = ($ward[0]['id_ward']);
                        
                    }else{
                        $id_ward = 99;
                    }
                    $id_order_main++;
                    LabOrderMain::insert([
                        "id_lab_order_main" => $id_order_main,
                        // "lab_order_no" => $new_lab_order_no,
                        "lab_order_no" => $requestLon[$i],
                        "VN" =>   null,
                        "date_ts" => null,
                        "id_department" => 5,
                        "id_service_plan" => $data_PV1[$i][10],
                        "id_clinic" => $id_clinic,
                        "id_patient" => $id_patient,
                        "id_doctor" => $id_docter,
                        "id_sevice_point" => 1,
                        "id_user" => 1,
                        "temperature" => null,
                        "bp_low" => null,
                        "bp_high" => null,
                        "pulse" => null,
                        "order_date" => date("Y-m-d H:i:s"),
                        "order_id_user" => 1,
                        "print_barcode_time" => null,
                        "receive_date" => null,
                        "receive_id_user" => null,
                        "correct_date" =>   null,
                        "correct_id_user" => null,
                        "id_appointment" => null,
                        "price" => null,
                        "total_price" => null,
                        "discount" => null,
                        "status" => 3,
                        "stdel" => 0,
                        "id_lab_form" => null,
                        "id_ward" => $id_ward,
                        "note" => null,
                        "id_hospital" => $data_PV1[$i][10],
                        "id_hospital_send" => 1,
                        "HosxP_HN" => $data_PID[$i][3],
                        "HosxP_lis" => $data_MSH[$i][9],
                        "HosxP_LN" => $data_ORC[$i][3]
                    ]);
                    
                    // echo "<hr><br> id_doctor => $id_docter";
                    // echo "<br> doctor_prefix => set 4";
                    // echo "<br> doctor_name => $doctor_name";
                    // echo "<br> doctor_lastname => $doctor_lastname";
                    // echo "<br> doctor_department => ";
                    // echo "<br> doctor_position => ";
                    // echo "<br> doctor_tel => ";
                    // echo "<br> stdel => ";
                    // echo "<br> doctor_specialty =>";
                    // echo "<br> id_hospital =>";

                    $HospitalMaster = HospitalMaster::select('*')->where('id_hospital',$data_PV1[$i][10])->get()->toArray();
                    if (count($HospitalMaster) == 0) {
                        HospitalMaster::insert([
                            "id_hospital" => $data_PV1[$i][10],
                            "hn_hospital" => null,
                            "hospital_name" => $data_PV1[$i][10],
                            "hospital_address" => null,
                            "hospital_tel" => null,
                            "stdel" => 0,
                        ]);
                    }
                    $DoctorMaster = DoctorMaster::select('*')->where('id_doctor',$id_docter)->get()->toArray();
                    if (count($DoctorMaster) == 0) {
                        DoctorMaster::insert([
                            "id_doctor" => $id_docter,
                            "doctor_prefix" => 4,
                            "doctor_name" =>   $doctor_name,
                            "doctor_lastname" => $doctor_lastname,
                            "doctor_department" => 5,
                            "doctor_position" => 3,
                            "doctor_tel" => null,
                            "stdel" => 0,
                            "doctor_specialty" => 7,
                            "id_hospital" => $data_PV1[$i][10],
                        ]);
                    }


                    $patient_hn_hl7 = $data_PID[$i][3];
                    // //  NAME PATIENT
                    $patient_name_hl7 = $data_PID[$i][5];
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
                
                        //กลับมาเช็ค
                    // BIRST DATE PATIENT
                    $patient_birth_hl7 = $data_PID[$i][7];
                    $len_str = strlen($patient_birth_hl7);
                    if ($len_str >= 8){
                        $patient_birth_year = $patient_birth_hl7[0].$patient_birth_hl7[1].$patient_birth_hl7[2].$patient_birth_hl7[3];
                        $patient_birth_month = $patient_birth_hl7[4].$patient_birth_hl7[5];
                        $patient_birth_days = $patient_birth_hl7[6].$patient_birth_hl7[7];
                        $patient_birth_date = $patient_birth_year.'-'.$patient_birth_month.'-'.$patient_birth_days;
                    }else {
                        $patient_birth_date = null;
                    }

                    // ADDRESS PATIENT 
                    $patient_address_hl7 = $data_PID[$i][11];
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
                   
                    $Patient_District = $patient_address[$i][2];
                    if($Patient_District != null){
                        if ($Patient_District != 'District'){
                            $aumphur  = AmphurMaster::where('amphur_name','like', '%' .$Patient_District.'%')
                                    ->orWhere('amphur_name_en','like', '%' .$Patient_District.'%')
                                    ->first()
                                    ->toArray();
                            $aumphur_id = $aumphur['amphur_id'];
                        }else{
                            $aumphur_id = null; 
                        }
                        
                    }else{
                        $aumphur_id = null; 
                    }

                    $Patient_Province = $patient_address[$i][3];
                    if(($Patient_Province != null) && ($Patient_Province != 'Province')){
                        $province  = ProvinceMaster::where('province_name','like', '%' .$Patient_Province.'%')
                                    ->orWhere('province_name_en','like', '%' .$Patient_Province.'%')
                                    ->first()
                                    ->toArray();
                        $province_id = $province['province_id'];
                    }else{
                        $province_id = null; 
                    }

                    $Patient_Zipcode = null;
                    if(count($patient_address[$i]) > 4){
                        $Patient_Zipcode = $patient_address[$i][4];
                    }

                    ////////insert ////////
                    //  echo "<script>console.log('insert')</script>";
                    PatientMaster::insert([
                        "hn" => $patient_hn_hl7,
                        "patient_firstname" => $patient_firstname,
                        "patient_lastname" =>   $patient_lastname,
                        "prefix_name" => $prefix_name,
                        "birthday" => $patient_birth_date,

                        "patient_address" => $Patient_address,
                        "patient_district" => $district_id,
                        "patient_amphur" => $aumphur_id,
                        "patient_province" => $province_id,
                        "patient_zipcode" => $Patient_Zipcode,
                        "private_docter_id" => $id_docter
                    ]);
                    
                    // echo "<hr><br>table patient_master <br><br>";
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

                    // $count_OBR = substr_count($data_OBR[$i],'OBR');
                    // $count_OBR = floor(count($data_OBR[$i])/42);
                    // echo $count_OBR;
                    $OBR = strchr($request_data[$i],"OBR");
                    $count_OBR = substr_count($OBR,'OBR');

                    for ($j=1; $j<=$count_OBR; $j++ ){
                        $sub_OBR[$i] =  explode("|", strchr(iconv('TIS-620','UTF-8',$request_data[$i] ),"OBR|$j"));
                        // print_r($sub_OBR);
                        // echo "<br><br>";

                        // echo $sub_OBR[$i][4];
                        // print_r($sub_OBR[$i]);
                        $lad_item[$i] = explode("^", $sub_OBR[$i][4]);
                        $docter[$i] = explode("^", $sub_OBR[$i][16]);
                        // echo "<br><br>";
                        // echo $lad_item[$i][0]," | " , $lad_item[$i][1]," | ", $lad_item[$i][2];
                        // echo "<br><br>";
                        $labitemGroup = LabItemMaster::select('*')->with('subGroup')->where('lab_item_code',$lad_item[$i][0])->get()->toArray();
                        // echo("------------------------------------------");
                        // print_r($labitemGroup);
                        $max_id_lab_item = DB::table('lab_item_master')->max('id_lab_item');
                        $id_lab_item = $max_id_lab_item + 1;
                        // echo "max_id_lab_item".$id_lab_item;
                        // echo ("asdasdsdsd".$labitemGroup);
                        $MAX_idItemtype = DB::table('lab_item_type_master')->max('id_Item_type');
                        $MAX_idItemtype = $MAX_idItemtype+1;
                        // print_r($MAX_idItemtype);

                        $id_Item_type = explode(" ", $lad_item[$i][2]);
                        $id_Item_type_count = LabItemTypeMaster::select('*')->where('item_type_code',$id_Item_type[0])->get()->toArray();
                        // echo "<br>";
                        // print_r($id_Item_type_count);
                        if (count($id_Item_type_count)== 0){
                            LabItemTypeMaster::insert([
                                "id_Item_type" => $MAX_idItemtype,
                                "item_type_name" => $id_Item_type[1],
                                "id_hospital" => $data_PV1[$i][10],
                                "stdel" => 0,
                                "item_type_code" => $id_Item_type[0]
                            ]);
                        }
                        $lab_Sub_Group_item = LabSubGroupItemMaster::select('*')->where('lab_sub_group_code',$id_Item_type[0])->get()->toArray();
                        if (count($lab_Sub_Group_item)== 0){
                            LabSubGroupItemMaster::insert([
                                "id_lab_sub_group_item" => $MAX_idItemtype,
                                "lab_sub_group_name" => $id_Item_type[1],
                                "lab_sub_group_code" => $id_Item_type[0],
                                "note" => null,
                                "stdel" => 0,
                                "id_hospital" => $data_PV1[$i][10]
                            ]);
                        }


                        if (count($labitemGroup) == 0){
                            echo $lad_item[$i][0]." -> ไม่มี lab_item_code นี้อยู่ใน table<br><br>";
                            echo "insert ordered -> $id_lab_item <br>";
                            echo "insert id_lab_item -> $id_lab_item <br>";
                            echo "insert lab_item_name -> ".$lad_item[$i][1] ."<br>";
                            echo "insert lab_item_code -> ".$lad_item[$i][0] ."<br>";
                            echo "insert lab_item_unit -> null <br>";
                            echo "insert lab_default_value -> 0 <br>";
                            echo "insert id_lab_item_sub_group -> 0 <br>";
                            echo "insert tat_default -> 60 <br>";
                            echo "insert stdel -> 1 <br>";
                            echo "insert mean_normal -> 0 <br>";
                            echo "insert sd_normal -> 0 <br>";
                            echo "insert status -> 0 <br>";
                            echo "insert id_hospital -> ".$data_PV1[$i][10]." <br>";
                            echo "insert lab_male_normal_value -> 0 <br>";
                            echo "insert lab_famale_normal_value -> 0 <br>";
                            echo "insert lab_child_normal_value -> 0 <br>";
                            echo "insert lab_pad_normal_value -> 0 <br>";
                            echo "insert id_group_barcode -> 0 <br>";
                            echo "insert id_lab_barcode -> 0 <br>";
                            echo "insert id_Item_type -> ".$lad_item[$i][2]." <br>";
                            echo "insert id_lab_specimen_item -> 0 <br>";

                            $id_Item_type = substr($lad_item[$i][2],0,2);
                            $id_Item_type = explode(" ", $lad_item[$i][2]);
                            $id_Item_type_count = LabItemTypeMaster::select('*')->where('item_type_code',$id_Item_type[0])->get()->toArray();

                            // print_r($id_Item_type_count);
                            if (count($id_Item_type_count)== 0){
                                LabItemTypeMaster::insert([
                                    "id_Item_type" => null,
                                    "item_type_name" => $id_Item_type[1],
                                    "id_hospital" => $data_PV1[$i][10],
                                    "stdel" => 0,
                                    "item_type_code" => $id_Item_type[0]
                                ]);
                            }
                            $lab_Sub_Group_item = LabSubGroupItemMaster::select('*')->where('lab_sub_group_code',$id_Item_type[0])->get()->toArray();
                            if (count($lab_Sub_Group_item)== 0){
                                LabSubGroupItemMaster::insert([
                                    "id_lab_sub_group_item" => null,
                                    "lab_sub_group_name" => $id_Item_type[1],
                                    "lab_sub_group_code" => $id_Item_type[0],
                                    "note" => null,
                                    "stdel" => 0,
                                    "id_hospital" => $data_PV1[$i][10]
                                ]);
                            }

                            LabItemMaster::insert([
                                "ordered" => $id_lab_item,
                                "id_lab_item" => $id_lab_item,
                                "lab_item_name" => $lad_item[$i][1],
                                "lab_item_code" => $lad_item[$i][0],
                                "lab_item_unit" => 'Unit',
                                "lab_default_value" => 0,
                                "id_lab_item_sub_group" => $MAX_idItemtype,
                                "tat_default" => 60,
                                "stdel" => 0,
                                "mean_normal" => 0,
                                "sd_normal" => 0,
                                "status" => 0,
                                "id_hospital" => $data_PV1[$i][10],
                                "lab_male_normal_value" => 0,
                                "lab_female_normal_value" => 0,
                                "lab_child_normal_value" => 0,
                                "lab_pad_normal_value" => 0,
                                "id_group_barcode" => 0,
                                "id_lab_barcode" => 0,
                                "id_Item_type" => $MAX_idItemtype,
                                "id_lab_specimen_item" => 0,
                            ]);
                        }
                        echo "<br><br>";

                        $DoctorMaster = DoctorMaster::select('*')->where('id_doctor',$docter[$i][0])->get()->toArray();
                        if (count($DoctorMaster) == 0) {
                            // echo $docter[$i][0].'<br>';
                            // echo $docter[$i][1].'<br>';
                            if (count($docter[$i]) > 1){
                                $docter_fullname[$i] = explode(" ", $docter[$i][1]);
                            // echo $docter_fullname[$i][0]."<br>";
                            // echo $docter_fullname[$i][1]."<br>";
                            }else{
                                $docter_fullname[$i][0] = $docter[$i][0];
                                $docter_fullname[$i][1] = null;
                            }

                            DoctorMaster::insert([
                                "id_doctor" => $docter[$i][0],
                                "doctor_prefix" => 4,
                                "doctor_name" =>   $docter_fullname[$i][0],
                                "doctor_lastname" => $docter_fullname[$i][1],
                                "doctor_department" => 5,
                                "doctor_position" => 3,
                                "doctor_tel" => null,
                                "stdel" => 0,
                                "doctor_specialty" => 7,
                                "id_hospital" => $data_PV1[$i][10],
                            ]);
                        }

                        // echo "id_lab_order_item -> null <br>";
                        // echo "id_lab_order_main -> $id_order_main <br>";
                        // echo "lab_item_code -> ".$lad_item[$i][0]." <br>";
                        // echo "lab_specimen -> ".$sub_OBR[$i][15]." <br>";
                        // echo "id_doctor -> ".$docter[$i][0]." <br>";
                        // echo "LabOrderItemLabOrderItemLabOrderItem";

                        $MAX_idOrderItem = DB::table('lab_order_item')->max('id_lab_order_item');
                        $idOrderItem =  $MAX_idOrderItem+1;
                        LabOrderItem::insert([
                            "id_lab_order_item" => $idOrderItem,
                            "id_lab_order_main" => $id_order_main,
                            "lab_item_code" => $lad_item[$i][0],
                            "lab_specimen" => $sub_OBR[$i][15],
                            "id_doctor" => $docter[$i][0],
                            "stdel" => 0
                        ]);
                        $LabItemMaster = LabItemMaster::select('id_lab_item')->where('lab_item_code', $lad_item[$i][0])->get();
                        $lab_default_value = $labitemGroup[0]['lab_default_value'];
                        $id_LabItem = $LabItemMaster[0]['id_lab_item'];
                        LabOrderDetail::insert([
                            "id_lab_order_detail" => null,
                            "id_lab_order_main" => $id_order_main,
                            "id_lab_item" => $id_LabItem,
                            "lab_result" => $lab_default_value,
                            "lab_result_repeat" => $lab_default_value,
                            'tat' => 60,
                            'analyzer_id' => 1,
                            'reported' => 1,
                            "stdel" => '0',
                            "status" => '3'
                        ]);
                        

                        // echo $sub_OBR[$i][15];
                        $specimen[$i] = explode("&", $sub_OBR[$i][15]);
                        $count_spec = count($specimen[$i]);
                        if ($count_spec >= 2){
                            $count_row = count(LabSpecimenItem::select('lab_specimen_item_code')->where('lab_specimen_item_code', $specimen[$i][0])->get());
                            if ($count_row == 0){
                                LabSpecimenItem::insert([
                                    "id_lab_specimen_item" => null,
                                    "lab_specimen_item_name" => $specimen[$i][1],
                                    "lab_specimen_item_code" => $specimen[$i][0],
                                    "lab_specimen_item_note" => $specimen[$i][1],
                                    "stdel" => 0,
                                    "id_hospital" => 1
                                ]);
                            }
                        }


                        // echo "<br><br>";
                        // echo "<hr>";
                    }

                    DB::table('lab_num')->where('id_num', 1)->update(['lab_request_id' => $request_id[$i]]);
                    // echo "update lab_num";

                }
            // }
            $i++;
        }
        
    }

    public function DeDatabase(){
        // $id_lab_order_main = LabOrderMain::select('id_lab_order_main')->get()->toArray();
        // foreach ($id_lab_order_main as $key => $value) {
        //     // print_r($value['id_lab_order_main']);
        //     $id_lab_order_main = $value['id_lab_order_main'];
        //     LabOrderMain::where('id_lab_order_main', $id_lab_order_main)->delete();
        // }

        // $id_lab_order_detail = LabOrderDetail::select('id_lab_order_detail')->get()->toArray();
        // foreach ($id_lab_order_detail as $key => $value) {
        //     // print_r($value['id_lab_order_main']);
        //     $id_lab_order_detail = $value['id_lab_order_detail'];
        //     LabOrderDetail::where('id_lab_order_detail', $id_lab_order_detail)->delete();
        // }
        // print_r ($id_lab_order_main);
        // LabOrderMain::where('id_lab_order_main', 503)->delete();
    }

    public function UpdateLabResultDetail($id, $Result){
        return $Result;
    }
}
