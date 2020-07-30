<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileTestLabItem;
use App\ProfileTestLabItemDetail;
use App\LabSubGroupItemMaster;
use App\LabItemMaster;
use Carbon\Carbon;
class ProfileTestController extends Controller
{
    //
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $data['user'] = session('user');
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        return view('management.management-profileTest.profile-test',$data);
    }
    public function GetAllProfileTest(){
      $QueryProfile = ProfileTestLabItem::select('*')
      //->with('profileTestItemDetail')
      ->where('stdel',0)
      ->get()->toArray();
      return response()->json(["data"=>$QueryProfile]);
    }
    public function GetProfileTestByLabSubGroup(int $id){
      $QueryProfile = ProfileTestLabItem::select('*')
      ->where('id_lab_sub_group_item',$id)
      ->where('stdel',0)
      ->with('profileTestItemDetail')
        ->get()->toArray();
      return response()->json(["data"=>$QueryProfile]);
    }
    public function GetProfileTestById(int $id){
      $QueryProfile = ProfileTestLabItem::select('*')
      ->where('id_profile_test',$id)
      ->where('stdel',0)
      ->with('profileTestItemDetail')
      ->first();
      return response()->json(["data"=>$QueryProfile]);
    }
    public function CreateProfileTest(Request $request){
      $request = $request->all();
      $data = session('user');
      // $time = date_default_timezone_set("Asia/Bangkok");
      // $timestamp = date('Y-m-d H:i:s');
      $lab_item = $request['lab_item'];

      $data['id_user'];

      //insert into profile test
      $insertSuccess = ProfileTestLabItem::insert([
          'profile_name'=>$request['profile_name'],
          'id_lab_sub_group_item'=>$request['id_lab_sub_group_item'],
          'id_user_create'=>  $data['id_user'],
          'id_hospital'=>$data['id_hospital'],
          'created_at'=>Carbon::now('Asia/Bangkok'),
      ]);
      if($insertSuccess){
        //insert into profile test detail
        $QueryProfile = ProfileTestLabItem::select('id_profile_test')
        ->orderBy('id_profile_test',"DESC")
        ->first();
        foreach($lab_item as $key => $val){
            ProfileTestLabItemDetail::insert([
                'id_profile_test_lab_item'=>$QueryProfile['id_profile_test'],
                'id_lab_item'=>$val['id_lab_item'],
                'created_at'=>Carbon::now('Asia/Bangkok'),
            ]);
        }
      }
      return response()->json(["success"=>$insertSuccess]);
    }
    public function EditProfileTest(Request $request){
      $request = $request->all();
      $data = session('user');
      $lab_item = $request['lab_item'];
      $id_lab_sub_group_item = $request['id_lab_sub_group_item'];
      $profile_test_name = $request['profile_name'];

      $profileTest = ProfileTestLabItem::select('*')
      ->where('id_profile_test',$request['id'])
      ->first();

      $id_profile_test = $profileTest['id_profile_test'];
      $datalab_db = ProfileTestLabItemDetail::select('*')->where('id_profile_test_lab_item',$id_profile_test)->get()->toArray();
      $DataInDBCount = count($datalab_db);
      $DataPostCount = count($lab_item);
      //return response()->json(["success"=>true,"data"=>$datalab_db]);
      //update table Profile Test Lab Item
      $result = ProfileTestLabItem::where('id_profile_test',$id_profile_test)
      ->update([
            'profile_name'=>$profile_test_name,
            'id_lab_sub_group_item'=>$id_lab_sub_group_item,
            'id_user_modify'=> $data['id_user'],
            'id_hospital'=>$data['id_hospital'],
            'updated_at'=>Carbon::now('Asia/Bangkok'),
        ]);

        //update profile Detail
        //count item lab in db
        if($DataInDBCount>=$DataPostCount){

          //Log::debug('EditLabOrderDetail $intersect',$intersect);
          for ($i=0;$i<count($datalab_db);$i++) {
            for($j=0;$j<count($lab_item);$j++){
                $profileDetail = ProfileTestLabItemDetail::where('id_profile_test_detail',$datalab_db[$j]['id_profile_test_detail'])->update([
                  'id_lab_item'=>$lab_item[$j]['id_lab_item'],
                  'updated_at'=>Carbon::now('Asia/Bangkok'),
              ]);

            }
            if($i>=count($lab_item)){
              ProfileTestLabItemDetail::where('id_profile_test_detail',$datalab_db[$i]['id_profile_test_detail'])->delete();
            }

          }
        }else{
          for ($i=0;$i<count($lab_item);$i++) {
            for($j=0;$j<count($datalab_db);$j++){
                $profileDetail = ProfileTestLabItemDetail::where('id_profile_test_detail',$datalab_db[$j]['id_profile_test_detail'])->update([
                  'id_lab_item'=>$lab_item[$j]['id_lab_item'],
                  'updated_at'=>Carbon::now('Asia/Bangkok'),
              ]);
            }
            if($i>=count($datalab_db)){
              $profileDetail = ProfileTestLabItemDetail::insert([
                  'id_profile_test_lab_item'=>$id_profile_test,
                  'id_lab_item'=>$lab_item[$i]['id_lab_item'],
                  'created_at'=>Carbon::now('Asia/Bangkok'),
                  'updated_at'=>Carbon::now('Asia/Bangkok'),
              ]);
            }
          }

        }
        $QueryProfile = ProfileTestLabItem::select('*')
        ->where('id_profile_test',$id_profile_test)
        ->with('profileTestItemDetail')->first();

      return response()->json(["success"=>$result,"data"=>$QueryProfile]);
    }

    public function DeleteProfileTestById(int $id){
      $profileTest = ProfileTestLabItem::select('*')
      ->where('id_profile_test',$id)
      ->update([
        'stdel'=>1,
      ]);
    }
}
