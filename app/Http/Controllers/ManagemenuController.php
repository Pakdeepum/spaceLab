<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupUserMaster;
use App\MenuRelateUser;
use App\MenuMasterData;

class ManagemenuController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-menu.management-menu',$data);
    }

    public function listgroup()
    {
        $Datauser = session('user');
        //dd($Datauser);
        $idhospital = $Datauser['id_hospital'];
        $group = GroupUserMaster::where('id_hospital',$idhospital)->get()->toArray();
        $data = json_encode(array('data'=>$group),JSON_UNESCAPED_UNICODE);
        return $data;

    }

    public function listMenu(int $id)
    {
        $allmenu = MenuRelateUser::select('id_menu')->where('id_user_group',$id)->get()->toArray();
        $listmenu = MenuMasterData::select('*')->whereIn('menu_tag',$allmenu)->get()->toArray();
        $data = json_encode(array('data'=>$listmenu),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function deletemenu(int $idmenu,int $idtag)
    {
       $datamenu = MenuRelateUser::where('id_user_group',$idmenu)->where('id_menu',$idtag)->delete();
       return $datamenu;
    }

    public function listAddmenu(int $idgroup)
    {

       $menuuser = MenuRelateUser::select('id_menu')->where('id_user_group',$idgroup)->get()->toArray();
       $allmenu = MenuMasterData::select('*')
       ->whereNotIn('menu_tag',$menuuser)
       ->get()->toArray();
       $data = json_encode(array('data'=>$allmenu),JSON_UNESCAPED_UNICODE);
       return $data;
    }

    public function Addmenu(Request $request)
    {
        $request = $request->all();
        $idgroup = $request['id'];
        $allmenu = $request['allmenu'];

        foreach($allmenu as $key => $val){
            MenuRelateUser::insert([
                'id_user_group'=>$idgroup,
                'id_menu'=>$val
            ]);
        }
        return "success";

    }
}
