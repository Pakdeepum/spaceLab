<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QcName;
use App\QcLevel;
use App\DepartmentMaster;
use App\ProfileQcMaster;
use App\VQcProfile;
use App\LabSubGroupItemMaster;
use App\LabItemMaster;
use App\ProfileQcItemDetail;
use App\VQCProfileDetail;
use Carbon\Carbon;
class QCsetupController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $data['user'] = session('user');
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        return view('QC.QC-setup.QC-setup',$data);
    }

    public function QueryItemProfile(int $id)
    {
        $item = VQCProfileDetail::where('id_profile_qc',$id)->get()->toArray();
        $data = json_encode(array('data'=>$item),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function QueryItemCompare(int $id,int $id_qc_level)
    {
        // $item = VQCProfileDetail::where('id_profile_qc',$id)->get()->toArray();
        $item = VQCProfileDetail::where(['stdel'=>0,'id_lab_item'=>$id])->where('id_qc_level',$id_qc_level)->get()->toArray();
        $data = json_encode(array('data'=>$item),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function listname()
    {
        $result = QcName::all()->where('stdel',0)->toArray();
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function listlevel()
    {
        $result = QcLevel::all()->where('stdel',0)->toArray();
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function listdepartment()
    {
        $result = DepartmentMaster::all()->where('stdel',0)->toArray();
        $data = json_encode(array('data'=>$result),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function AddProfile(string $profile,int $department,int $qcname,int $qclevel,string $lot,int $userid,int $hospitalid)
    {
        $data = ProfileQcMaster::insert([
            'profile_name'=>$profile,
            'id_department'=>$department,
            'id_qc_name'=>$qcname,
            'id_qc_level'=>$qclevel,
            'lot_number'=>$lot,
            'id_user_create'=>$userid,
            'date_create'=> Carbon::now('Asia/Bangkok'),
            'id_hospital'=>$hospitalid
        ]);
        return response()->json(['success' => true]);
    }

    public function allProfile()
    {
        $data = session('user');
        
        $profile = VQcProfile::where(['stdel'=>0,'id_hospital'=>$data['id_hospital']])->get()->toArray();
        $data = json_encode(array('data'=>$profile),JSON_UNESCAPED_UNICODE);

        return $data;
    }

    public function listgroupitem()
    {
        $data = session('user');
        $group = LabSubGroupItemMaster::where('id_hospital',$data['id_hospital'])->get()->toArray();
        $data = json_encode(array('data'=>$group),JSON_UNESCAPED_UNICODE);
        \Log::debug('data',[$data]);
        return $data;
        
    }

    public function Selecteditem(int $id)
    {
        $item = LabItemMaster::where('id_lab_item_sub_group',$id)->where('stdel',0)->orderBy('ordered','ASC')->get()->toArray();
        $data = json_encode(array('data'=>$item),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function listProfileID(int $id)
    {
        $QueryProfile = VQcProfile::where('id_profile_qc',$id)->get()->toArray();
        $data = json_encode(array('data'=>$QueryProfile),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DeleteProfileID(int $id)
    {
        $data = ProfileQcMaster::where('id_profile_qc',$id)
        ->update([
            'stdel'=>1
        ]);


        if($data){
            $result=1;
        }else{
            $result=0;
        }
        return $result;
    }

    public function QueryItem(int $id)
    {
        $item = LabItemMaster::where('id_lab_item',$id)->get()->toArray();
        $data = json_encode(array('data'=>$item),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function AddProfileItemDetail(Request $request)
    {
        $request = $request->all();
        $idprofile = ProfileQcMaster::select('id_profile_qc')->orderBy('id_profile_qc','DESC')->get()->toArray();
        $Idprofilemain = $idprofile[0]['id_profile_qc'];
        foreach($request['Data'] as $key => $val){
            ProfileQcItemDetail::insert([
                'id_profile_qc_main'=>$Idprofilemain,
                'id_item_qc'=>$val['id_lab_item'],
                'mean'=>$val['mean'],
                'sd'=>$val['sd'],
            ]);
        }

        return "ok";   
    }

    public function AddEditProfileItemDetail(Request $request)
    {
        $request = $request->all();
        //dd($request['id']);
        $idgroup = $request['id'];
       
        ProfileQcItemDetail::where('id_profile_qc_main',$idgroup)->delete();
        foreach($request['Data'] as $key => $val){
            ProfileQcItemDetail::insert([
                'id_profile_qc_main'=>$idgroup,
                'id_item_qc'=>$val['id_lab_item'],
                'mean'=>$val['mean'],
                'sd'=>$val['sd'],
            ]);
        }

        return "ok";   
    }

    public function EditProfile(Request $request)
    {
        $request = $request->all();
        $data = session('user');
        $time = date_default_timezone_set("Asia/Bangkok");
        $timestamp = date('Y-m-d H:i:s');
        
        $data['id_user'];
        
        $data = ProfileQcMaster::where('id_profile_qc',$request['id'])
        ->update([
            'profile_name'=>$request['profilename'],
            'id_department'=>$request['department'],
            'id_qc_name'=>$request['qcname'],
            'id_qc_level'=>$request['qclevel'],
            'lot_number'=>$request['lotnumber'],
            'id_user_modify'=>$data['id_user'],
            'date_modify'=>$timestamp,
        ]);

        if($data){
            $result = 1;
        }else{
            $result=0;
        }
        return $result;
        
    }
}
