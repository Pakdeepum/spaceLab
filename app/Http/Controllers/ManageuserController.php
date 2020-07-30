<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrefixMaster;
use App\PositionMaster;
use App\DepartmentMaster;
use App\UserMaster;
use App\GroupUserMaster;
use App\user;
use App\Vusermaster;
use Carbon\Carbon;
use File;
use Storage;

class ManageuserController extends Controller
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
        return view('management.management-user.management-user',$data);
    }

    public function listuser()
    {
        $alluser = UserMaster::all()->where('stdel',0)->toArray();
        $newid=[];
        foreach($alluser as $key => $val) {
            $dataid = GroupUserMaster::select('group_user_name')
            ->where('stdel',0)
            ->where('id_group_user',$val['id_group_user'])
            ->get()->toArray();
            $newid[] = array_merge($val,$dataid[0]);
            //dd($newid);
        }
        $data = json_encode(array('datauser'=>$newid),JSON_UNESCAPED_UNICODE);
        return $data;

    }

    public function PrefixMasterData()
    {
        $DataPrefixName = PrefixMaster::All()->where('stdel',0);
        $data = json_encode(array('data'=>$DataPrefixName),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function PositionMasterData()
    {

        $DataPositionName = PositionMaster::All();
        $data = json_encode(array('data'=>$DataPositionName),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function GroupUserMasterData()
    {
        $DataGroupUserName = GroupUserMaster::All();
        $data = json_encode(array('data'=>$DataGroupUserName),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DepartmentMasterData()
    {
        $DataDepartmentName = DepartmentMaster::All();
        $data = json_encode(array('data'=>$DataDepartmentName),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function AddUser(Request $request)
    {
        //has file
        if($request->hasFile('images')){
            $newpassword = md5($request['password']);

            $images = $this->createName( $request->file('images'));
            $path = $request->file('images')->move('storage/img/users/', $images);

            UserMaster::insert([
                    'username'=>$request['username'],
                    'password'=>$newpassword,
                    'prefix_name'=>$request['prefix'],
                    'fname'=>$request['fname'],
                    'lastname'=>$request['lname'],
                    'position'=>$request['position'],
                    'user_department'=>$request['department'],
                    'id_hospital'=>$request['id_hospital'],
                    'id_group_user'=>$request['groupuser'],
                    'regis_date' => Carbon::now('Asia/Bangkok'),
                    'user_pic_url' => $images
                ]);
        }
        //No file
        else{

            $request = $request->All();
            $newpassword = md5($request['password']);
            UserMaster::insert(
            [
                'username'=>$request['username'],
                'password'=>$newpassword,
                'prefix_name'=>$request['prefix'],
                'fname'=>$request['fname'],
                'lastname'=>$request['lname'],
                'position'=>$request['position'],
                'user_department'=>$request['department'],
                'id_hospital'=>$request['id_hospital'],
                'regis_date' => Carbon::now('Asia/Bangkok'),
                'id_group_user'=>$request['groupuser']
            ]);
        }
        return redirect()->back();
    }

    private function createName($file){
        $filename = null;
        /**create new the image name*/
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time();
        $filename = base64_encode($filename.str_random(3));
        $filename = $filename.'.'.$file->getClientOriginalExtension();
        return $filename;
    }

    public function DeleteUser(int $subid)
    {
        $data = UserMaster::where('id_user',$subid)->update([
            'stdel'=>1,
        ]);
        return $data;
    }
    public function EditUser(int $subid)
    {
        $alluser = Vusermaster::where('id_user',$subid)->get();
        $data = json_encode(array('data'=>$alluser),JSON_UNESCAPED_UNICODE);

        return $data;
    }
    public function SaveEditUser(Request $request) {
        $destination = public_path('storage/img/users/');
       // has file
        if($request->hasFile('images')){
            $path = $destination.$request->input('ofile');
            if(file_exists($path)){
                File::delete($path);
            }
            $images = $this->createName( $request->file('images'));
            $path = $request->file('images')->move('storage/img/users/', $images);
            // No Password
            if($request['password'] == null){
                UserMaster::where('id_user',$request['iduser'])->update([
                        'username'=>$request['username'],
                        'prefix_name'=>$request['prefix'],
                        'fname'=>$request['fname'],
                        'lastname'=>$request['lastname'],
                        'position'=>$request['position'],
                        'user_department'=>$request['department'],
                        'id_hospital'=>$request['id_hospital'],
                        'id_group_user'=>$request['groupuser'],
                        'user_pic_url' => $images
                    ]);
            }
            //has Password
            else{
                $newpassword = md5($request['password']);
                UserMaster::where('id_user',$request['iduser'])->update([
                        'username'=>$request['username'],
                        'password'=>$newpassword,
                        'prefix_name'=>$request['prefix'],
                        'fname'=>$request['fname'],
                        'lastname'=>$request['lastname'],
                        'position'=>$request['position'],
                        'user_department'=>$request['department'],
                        'id_hospital'=>$request['id_hospital'],
                        'id_group_user'=>$request['groupuser'],
                        'user_pic_url' => $images
                    ]);
            }
        }else{
           //No file
            $request = $request->All();
            //No Password
            if($request['password'] == null){
                UserMaster::where('id_user',$request['iduser'])->update([
                        'username'=>$request['username'],
                        'prefix_name'=>$request['prefix'],
                        'fname'=>$request['fname'],
                        'lastname'=>$request['lastname'],
                        'position'=>$request['position'],
                        'user_department'=>$request['department'],
                        'id_hospital'=>$request['id_hospital'],
                        'id_group_user'=>$request['groupuser']
                    ]);
            }else{
                //has Password
                $newpassword = md5($request['password']);
                UserMaster::where('id_user',$request['iduser'])->update([
                    'username'=>$request['username'],
                    'password'=>$newpassword,
                    'prefix_name'=>$request['prefix'],
                    'fname'=>$request['fname'],
                    'lastname'=>$request['lastname'],
                    'position'=>$request['position'],
                    'user_department'=>$request['department'],
                    'id_hospital'=>$request['id_hospital'],
                    'id_group_user'=>$request['groupuser']
                ]);
            }
        }
        return redirect()->back();
    }
    public function PincodePage(){
      if(session('user') == null){
          return redirect('/login');
      }

      //$data['alluser'] = UserMaster::all()->toArray();

      $listmenu = session('listmenu');
      $data['listmenu'] = $listmenu;
      $data['user'] = session('user');
      return view('auth.set-pincode',$data);
    }
    public function UpdatePincode(Request $request){
      $user = session('user');
      $id = $user['id_user'];
      $result = UserMaster::where('id_user',$id)->update([
        'pincode'=>$request['pincode']
      ]);
      return response()->json(['success'=>$result]);
    }
    public function GetAllUserPincode(){
      $userList = UserMaster::select('id_user','pincode')->where('stdel',0)->get();
      return response()->json(['data'=>$userList]);
    }
    public function GetUserByPincode(String $pincode){
      $user = UserMaster::select('id_user','pincode')->where('pincode',$pincode)->where('stdel',0)->get();
      if($user!=null){
        if(count($user)>0){
          \Log::Debug('get user by barcode:',[$user]);
          return response()->json(['data'=>$user[0]]);
        }        
      }
      return response()->json(['data'=>null]);
    }
    public function GetCurrentUser(){
      $user = session('user');
      $id = $user['id_user'];
      return $this->GetUserById($id);
    }
    public function GetUserById(int $id){
      $userData = UserMaster::all()->where('stdel',0)->where('id_user',$id)->toArray();
      $newid=[];
      foreach($userData as $key => $val) {
          $dataid = GroupUserMaster::select('group_user_name')
          ->where('stdel',0)
          ->where('id_group_user',$val['id_group_user'])
          ->get()->toArray();
          $newid[] = array_merge($val,$dataid[0]);
          //dd($newid);
      }
      $data = json_encode(array('datauser'=>$newid),JSON_UNESCAPED_UNICODE);
      return $data;
    }
}
