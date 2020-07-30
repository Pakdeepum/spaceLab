<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMaster;
use Illuminate\Support\Facades\DB;
use App\SpecialtyMaster;
use App\Vdoctor;
use App\TableDoctorMaster;

class ManageDoctorController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }

        $data['alluser'] = UserMaster::all()->toArray();

        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-doctor.management-doctor',$data);
    }
    public function listDoctor(string $dataSeach)
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        $allDoctorDB = Vdoctor::where(DB::raw("CONCAT(prefix_name,' ',doctor_name,' ',doctor_lastname)"),'like', '%' . $dataSeach. '%')
        ->orWhere('doctor_name','like', '%' . $dataSeach. '%')
        ->orWhere('doctor_lastname','like', '%' . $dataSeach. '%')
        ->orWhere('prefix_name','like', '%' . $dataSeach. '%')->get()->toArray();
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function listDoctorAll()
    {
       $user = session('user');
       $IDhospital = $user['id_hospital'];
    //    $sql_str = " select * from vdoctor where id_hospital =  ".$IDhospital." and stdel = 0";
       $sql_str = " select * from vdoctor";
       $allDoctorDB = DB::select(DB::raw($sql_str));
       $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
       return $allDoctor;
    }
    public function specialtyMasterData()
    {
        $specialtyData = SpecialtyMaster::All();
        $data = json_encode(array('data'=>$specialtyData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function AddDoctor(Request $request)
    {
        //dd($request);
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        $request = $request->All();
        $idDoc = $request['iddoctor'];
        $sql_str = "insert into `doctor_master` (`doctor_prefix`, `doctor_name`, `doctor_lastname`, `doctor_department`, `doctor_position`, `doctor_tel`, `doctor_specialty`,`id_hospital`) values ";
        $sql_str .= "(".$request['PrefixAdd'].", ";
        $sql_str .= "'".$request['firstNameAdd']."',";
        $sql_str .= " '".$request['lastNameAdd']."',";
        $sql_str .= " '".$request['departmentAdd']."',";
        $sql_str .= " ".$request['positionAdd'].",";
        $sql_str .= " ".$request['telNoAdd'].",";
        $sql_str .= " ".$request['specialtyAdd'].",";
        $sql_str .=  " ".$IDhospital.")";
        //dd($sql_str);
        $data = DB::insert($sql_str);
        if ($data) {
            $result = 1;
        } else {
            $result = 0;
        }
        return redirect()->back();
    }
    public function EditDoctor(int $doctorID)
    {
        $allDoctor = Vdoctor::where('id_doctor',$doctorID)->get()->toArray();
        $data = json_encode(array('data'=>$allDoctor),JSON_UNESCAPED_UNICODE);
        //dd($data);
        return $data;
    }
    public function SaveEditDoctor(Request $request)
    {
        //dd($request);
        $idDoctor = $request['iddoctor'];
        $request = $request->All();
        // update in sql
        $sql_str = "update `doctor_master` set `doctor_prefix` = ".$request['PrefixEdit']."";
        $sql_str .=  ", `doctor_name` = '".$request['firstNameEdit']. "' ";
        $sql_str .= ", `doctor_lastname` = '".$request['lastNameEdit']."' ";
        $sql_str .= " , `doctor_department` = ".$request['departmentEdit']." ";
        $sql_str .= " , `doctor_position` = ".$request['positionEdit']." ";
        $sql_str .= " , `doctor_tel` = ".$request['telNoEdit']." ";
        $sql_str .= " , `doctor_specialty` = ".$request['specialtyEdit']." ";
        $sql_str .= " where id_doctor = ".$idDoctor." ";
        //dd($sql_str);
        $data = DB::insert($sql_str);
        if ($data) {
            $result = 1;
        } else {
            $result = 0;
        }
        return redirect()->back();
    }
    public function DeleteDoctor(int $docID)
    {
        $data = TableDoctorMaster::where('id_doctor',$docID)->update(['stdel'=>1]);
        if($data) {
            $result = 1;
        } else {
            $result = 0;
        }
        return $result;
    }
}
