<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LabItemMaster;
class ManageconfigController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-config.management-config',$data);
    }

    public function listitemMaster()
    {
        $items = LabItemMaster::where('id_lab_item_sub_group', 0)->where('stdel',0)->orderBy('ordered','ASC')->get()->toArray();
        $data = json_encode(array('data'=>$items),JSON_UNESCAPED_UNICODE);
        \Log::debug('items',[$data]);
        return $data;
    }
    public function deleteItem(Request $request)
    {

        $data = LabItemMaster::where('id_lab_item',$request['id'])
        ->update([
            'id_lab_item_sub_group'=>0
        ]);

        if($data){
            $result = 1;
        }else{
            $result=0;
        }
        return redirect("management/manageConfig");
    }

    public function UpdateitemConfig(Request $request)
    {
        $request = $request->all();
        $users = session('user');
        $dataall = $request['dataitemall'];

        foreach($dataall as $val){
            LabItemMaster::where('id_lab_item',$val['id_lab_item'])
            ->update([
                'id_lab_item_sub_group'=>$request['groupitem']
            ]);
        }
        return "successs";
    }
}
