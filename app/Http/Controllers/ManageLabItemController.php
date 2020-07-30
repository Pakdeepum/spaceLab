<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LabItemMaster;

class ManageLabItemController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-labitem.management-labitem',$data);
    }

    public function ListItemLab()
    {
        $user = session('user');

        $IDhospital = $user['id_hospital'];
        $sql_str = " select * from lab_item_master where id_hospital = ". $IDhospital ." and stdel = 0 order by ordered";

        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function getItemLab(Request $request)
    {
        $user = session('user');
        $hospital = $user['id_hospital'];

        $labItem = LabItemMaster::where('id_hospital', $hospital)->where('stdel',0)
        ->where('lab_item_name','like', '%' . $request->input('filter'). '%')
        ->orWhere('lab_item_code','like', '%' . $request->input('filter'). '%')->get()->toArray();

        $allDoctor = json_encode(array('data'=>$labItem),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }


    public function ListItemLabType()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        $sql_str = " select * from lab_item_type_master where id_hospital = ". $IDhospital ." and stdel = 0";
        //dd($sql_str);
        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function ListGroupBarcode()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        $sql_str = " select * from group_barcode_master where id_hospital = ". $IDhospital ." and stdel = 0";
        //dd($sql_str);
        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }
    public function UpdateOrder(Request $request){
        $labItem = DB::table('lab_item_master')->orderBy('ordered','ASC')->get();
        $itemID = $request['itemID'];
        $itemIndex = 0;
        
        foreach($labItem as $value){
             DB::table('lab_item_master')->where('id_lab_item',$itemID[$itemIndex])->update(array('ordered'=> $itemIndex));
             \Log::Debug('itemid',[$itemID[$itemIndex]]);
             $itemIndex++;
             
        }
        return response('Success',200);
        
    }


    public function AddLabItem(Request $request)
    {
        $request = $request->all();
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        LabItemMaster::insert([
                'lab_item_name'=>$request['ItemNameAdd'],
                'lab_item_code'=>$request['ItemCodeAdd'],
                'lab_item_unit'=>$request['UnitAdd'],
                'lab_default_value'=>$request['DefaultAdd'],
                'lab_normal_value'=>$request['NormalAdd'],
                'lab_male_normal_value'=>$request['MaleNormalAdd'],
                'lab_female_normal_value'=>$request['FemaleNormalAdd'],
                'lab_child_normal_value'=>$request['ChildNormalAdd'],
                'lab_pad_normal_value'=>$request['PedNormalAdd'],
                'id_group_barcode'=>$request['GroupBarcodeAdd'],
                'id_group_result'=>$request['GroupResultAdd'],
                'id_lab_barcode'=>$request['LabBarcodeAdd'],
                'id_lab_specimen_item'=>$request['LabSpecimenAdd'],
                'id_Item_type'=>$request['ItemTypeAdd'],
                'hint'=>$request['HintAdd'],
                'thai_name'=>$request['ThaiNameAdd'],
                'eng_name'=>$request['EnglishNameAdd'],
                'critical_value'=>$request['CriticalAdd'],
                'out_lab'=>$request['OutLabAdd'],
                'id_hospital' =>$IDhospital,
                '_decimal' => $request['decimal']
            ]);

        return redirect()->back();
    }

    public function SaveEditLab(Request $request)
    {
        //dd($request);
        $request = $request->All();
        $idLab = $request['idLab'];
        // update in sql
        $sql_str = "update `lab_item_master` set `lab_item_name` = '".$request['ItemNameAdd']."'";
        $sql_str .=  ", `lab_item_code` = '".$request['ItemCodeAdd']. "' ";
        $sql_str .= " , `lab_default_value` = '".$request['DefaultAdd']."' ";
        $sql_str .= " , `lab_normal_value` = '".$request['NormalAdd']."' ";
        $sql_str .= " , `lab_male_normal_value` = '".$request['MaleNormalAdd']."' ";
        $sql_str .= " , `lab_female_normal_value` = '".$request['FemaleNormalAdd']."' ";
        $sql_str .= " , `lab_child_normal_value` = '".$request['ChildNormalAdd']."' ";
        $sql_str .= " , `lab_pad_normal_value` = '".$request['PedNormalAdd']."' ";
        $sql_str .= " , `id_group_barcode` = ".$request['GroupBarcodeAdd']." ";
        $sql_str .= " , `id_group_result` = ".$request['GroupResultAdd']." ";
        $sql_str .= " , `id_lab_barcode` = ".$request['LabBarcodeAdd']." ";
        $sql_str .= " , `id_Item_type` = ".$request['ItemTypeAdd']." ";
        $sql_str .= " , `id_lab_specimen_item` = ".$request['LabSpecimenAdd']." ";
        $sql_str .= " , `hint` = '".$request['HintAdd']."' ";
        $sql_str .= " , `thai_name` = '".$request['ThaiNameAdd']."' ";
        $sql_str .= " , `eng_name` = '".$request['EnglishNameAdd']."' ";
        $sql_str .= " , `lab_item_unit` = '".$request['UnitAdd']."' ";
        $sql_str .= " , `critical_value` = '".$request['CriticalAdd']."' ";
        $sql_str .= " , `out_lab` = ".$request['OutLabAdd']." ";
        $sql_str .= " , `_decimal` = ".$request['Decimale']." ";
        $sql_str .= " where id_lab_item = ".$idLab." ";

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

    public function ListGroupResult()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        $sql_str = " select * from group_result_master where id_hospital = ". $IDhospital ." and stdel = 0";
        //dd($sql_str);
        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function ListLabBarcode()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        $sql_str = " select * from lab_barcode_master where id_hospital = ". $IDhospital ." and stdel = 0";
        //dd($sql_str);
        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function ListSpecimen()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];

        $sql_str = " select * from lab_specimen_item_master where id_hospital = ". $IDhospital ." and stdel = 0";
        //dd($sql_str);
        $allDoctorDB = DB::select(DB::raw($sql_str));
        $allDoctor = json_encode(array('data'=>$allDoctorDB),JSON_UNESCAPED_UNICODE);
        return $allDoctor;
    }

    public function DelLab(int $IdLab)
    {
        $data = LabItemMaster::where('id_lab_item',$IdLab)->update(['stdel'=>1]);
        if($data) {
            $result = 1;
        } else {
            $result = 0;
        }
        return $result;

    }

    public function ListItemIndexLab(int $IdLab)
    {
        $sql_str = " select * from vlab_item where id_lab_item = ".$IdLab;
        //dd($sql_str);
        $allLabItemDB = DB::select(DB::raw($sql_str));
        $allLabItemDB = json_encode(array('data'=>$allLabItemDB),JSON_UNESCAPED_UNICODE);
        return $allLabItemDB;
    }
}
