<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemMaster;
use App\VtableMaster;
use App\TableSystemDescription;
use App\UserMaster;
use App\HospitalMaster;

use Illuminate\Support\Facades\DB;


class ManagedataController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-data.management-data',$data);
    }

    public function listMaster()
    {
       $allmaster = SystemMaster::select('*')->where('stdel',0)->get()->toArray();

       $data = json_encode(array('data'=>$allmaster),JSON_UNESCAPED_UNICODE);

       return $data;
    }


    public function listMasterDetail(int $id)
    {
            // head table sub
            $allmaster = VtableMaster::select('*')
            ->where('id_table',$id)->orderBy('priority','DESC')->get()->toArray();
            $data = json_encode(array('data'=>$allmaster),JSON_UNESCAPED_UNICODE);
            return $data;
    }

    public function listSubMasterDetail(int $id)
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        $allmaster = SystemMaster::select('*')
        ->where('id_table',$id)->where('stdel',0)->get()->toArray();

        $masterTable = $allmaster[0]['table_name_use'];

        // field data select
        $description = TableSystemDescription::select('table_field_name_use')
        ->where('id_table',$id)->orderBy('priority','DESC')->orderBy('id_table_field_name', 'ASC')->get()->toArray();

        $sql_str = "select " ;
        $i = 0;
        foreach ($description AS $val) {
            if ($i == 0)  {
                $sql_str .= $val['table_field_name_use'] . " AS id_temp " ;
            }
            else  {
                $sql_str .= ",".$val['table_field_name_use'] ;
            }
            $i++;
        }
        //$sql_str .= " FROM " . $masterTable . " WHERE stdel = 0 AND id_hospital = ". $IDhospital ;
        $sql_str .= " FROM " . $masterTable . " WHERE stdel = 0 " ;
        $results = DB::select(DB::raw($sql_str));
        $data = json_encode(array('data'=>$results),JSON_UNESCAPED_UNICODE);
        //dd($data);
        return $data;
    }


    public function softDelete(int $masterid,int $subid)
    {

        $datamaster = SystemMaster::select('*')
        ->where('id_table',$masterid)->where('stdel',0)->get()->toArray();
        $tableuse = $datamaster[0]['table_name_use'];

        $id_table = TableSystemDescription::select('table_field_name_use')
        ->where('id_table',$masterid)->where('priority',1)
        ->get()->toArray();
        $prikey_table = $id_table[0]['table_field_name_use'];

        $sql_str = "update ".$tableuse." SET stdel=1 WHERE ".$prikey_table."=".$subid;

        $result = DB::update($sql_str);

        return $result;
    }


    public function listdataEdit(int $masterid,int $subid)
    {
        $datamaster = SystemMaster::select('*')
        ->where('id_table',$masterid)->where('stdel',0)->get()->toArray();
        $tableuse = $datamaster[0]['table_name_use'];

        $id_table = TableSystemDescription::select('table_field_name_use')
        ->where('id_table',$masterid)->where('priority',1)
        ->get()->toArray();
        $prikey_table = $id_table[0]['table_field_name_use'];

        $field_table = TableSystemDescription::select('table_field_name_use','table_field_name_show')
        ->where('id_table',$masterid)->where('priority',0)
        ->get()->toArray();

        $sql_str = "select " ;
        $i = 0;
        foreach ($field_table AS $val)        {

            if ($i == 0)
            {
                $sql_str .= $val['table_field_name_use'];
            }
            else
            {
                $sql_str .= ",".$val['table_field_name_use'];
            }

            $i++;
        }
        $sql_str .= " from ".$tableuse." WHERE ".$prikey_table."=".$subid;

        $result_temp = DB::select(DB::raw($sql_str));
        $results = json_decode(json_encode($result_temp), true);
        $i = 0;
        $results_temp2 = array();
        foreach ($results AS $val) {
            foreach($val AS $colval)  {
                array_push($results_temp2,array('table_value' => $val[$field_table[$i]['table_field_name_use']],'table_name' => $field_table[$i]['table_field_name_show'],'table_id' => $field_table[$i]['table_field_name_use'] ));
                $i++;
            }
        }
        $data = json_encode(array('data'=>$results_temp2),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DataEdit(Request $request)
    {
        //$request = $request->all();

        $myjson1 = $request->get('data')["mysjon"];
        $myjson2 = $request->get('data')["mysjon2"];
        $id_table = $request->get('data')["scope1"];
        $id_field_table = $request->get('data')["scope2"];

        $results_Array_Field = json_decode($myjson1);
        $results_Array_Value = json_decode($myjson2);
        $datamaster = SystemMaster::select('*')
        ->where('id_table',$id_table)->where('stdel',0)->get()->toArray();
        $tableuse = $datamaster[0]['table_name_use'];

        $id_table = TableSystemDescription::select('table_field_name_use')
        ->where('id_table',$id_table)->where('priority',1)
        ->get()->toArray();
        $prikey_table = $id_table[0]['table_field_name_use'];

        $i = 0;

        $sql_str = "update ".$tableuse." set ";
        foreach ($results_Array_Field AS $val)
        {
            if ($i == 0)
            {
                $sql_str .= $results_Array_Value[$i] . "= '" . $val . "' ";

            }
            else
            {
                $sql_str .= ",".$results_Array_Value[$i] . "='" . $val . "' ";
            }
            $i++;
        }

        $sql_str .= " where ".$prikey_table."=".$id_field_table;
        $result = DB::update($sql_str);
        return $result;
    }


    public function DataAdd(int $masterid)
    {

        //dd($masterid);
        $field_table = TableSystemDescription::select('table_field_name_use','table_field_name_show')
        ->where('id_table',$masterid)->where('priority',0)
        ->get()->toArray();
        $result = json_encode(array('data'=>$field_table),JSON_UNESCAPED_UNICODE);
        return $result;
    }

    public function DataInsert(Request $request)
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        //$request = $request->all();

        $myjson1 = $request->get('data')["mysjon"];
        $myjson2 = $request->get('data')["mysjon2"];
        $id_table = $request->get('data')["scope1"];
        $results_Array_Field = json_decode($myjson1);
        $results_Array_Value = json_decode($myjson2);

        $datamaster = SystemMaster::select('*')
        ->where('id_table',$id_table)->where('stdel',0)->get()->toArray();
        $tableuse = $datamaster[0]['table_name_use'];

        if($tableuse == "hospital_master"){
            $_id = HospitalMaster::orderBy('id_hospital','DESC')->limit(1)->get();
            if(count($_id) > 0){
                $IDhospital = ($_id[0]['id_hospital']) + 1;
            }else{
                $IDhospital = 1;
            }
        }
        $i = 0;
        $sql_str = "insert into ".$tableuse." ( ";
        foreach ($results_Array_Value AS $val)
        {
            if ($i == 0){
                $sql_str .= $val ;
            } else {
                $sql_str .= ",".$val ;
            }
            $i++;
        }
        $sql_str .= ",id_hospital) " . "  values (";
        $j = 0;
        foreach ($results_Array_Field AS $val) {
            if ($j == 0) {
                $sql_str .=  "'" . $val . "'" ;
            }  else  {
                $sql_str .= ","."'" .$val . "'" ;
            }
            $j++;
        }
        $sql_str .= ",$IDhospital) ";

        $data = DB::insert($sql_str);
        return response()->json($data);
    }
}
