<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserMaster;
use App\GroupUser;
use App\MenuRelateUser;
use App\MenuMasterData;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        return '/welcome';
    }

    public function index(Request $request)
    {
        $request = $request->all();
        $username = $request['username'];
        $password = $request['password'];
        $newpassword = md5($password);
        
        // user;
        $check_password = UserMaster::select('*')
        ->where('username',$username)
        ->where('password',$newpassword)
        ->first();

        if($check_password == null){
            return redirect('/login')->with('msg','These credentials do not match our records.');
        }
        
        $groupid = $check_password->id_group_user;
        
        //group user
        $groupuser = GroupUser::select('*')
        ->where('id_group_user',$groupid)
        ->get()->toArray();
        
        
        //MenuRelateUser
        $menuRelate = MenuRelateUser::select('id_menu')
        ->where('id_user_group',$groupid)->get()->toArray();
        
        $ListMenu = MenuMasterData::select('menu_name','menu_tag')
        ->whereIn('menu_tag',$menuRelate)->get()->toArray();
        $newlist = [];
        foreach($ListMenu as $valmenu){
            
            $newlist[] = trim($valmenu['menu_tag']);
        }
        session(['listmenu'=>$newlist]);
        $value = session('listmenu');
        

    

        // $data['data'] = json_encode(array('data'=>$ListMenu),JSON_UNESCAPED_UNICODE);
        $data['data'] = $ListMenu;
        $data['check_password'] = $check_password; // listdataUser
        $data['value'] = $value;
        $data['user'] = session(['user'=>$check_password]);
        $data['groupuser'] = session(['Groupuser'=>$groupuser]);
        if($check_password['username'] != null){
            return redirect('/Welcome')->with('data',$data);
        }else{
            // return view('auth.login')->with('login_fail','msg_error');
            return redirect('/')->with('msg','Wrong Username or Passwor Try again or click Forgot password to reset it');
        }
    }


    // public function listjson(string $request)
    // {
    //     dd($request);
    //     $request = $request->all();
        
    //     $username = $request['username'];
    //     $password = $request['password'];
    //     $newpassword = md5($password);
        
    //     // user;
    //     $check_password = UserMaster::select('*')
    //     ->where('username',$username)
    //     ->where('password',$newpassword)
    //     ->first();
    //     $groupid = $check_password->id_group_user;
        
    //     //group user
    //     $groupuser = GroupUser::select('*')
    //     ->where('id_group_user',$groupid)
    //     ->get()->toArray();
        

    //     //MenuRelateUser
    //     $menuRelate = MenuRelateUser::select('id_menu')
    //     ->where('id_user_group',$groupid)->get()->toArray();
        
    //     $ListMenu = MenuMasterData::select('menu_name','menu_tag')
    //     ->whereIn('menu_tag',$menuRelate)->get()->toArray();
        
    //     $data = json_encode(array('data'=>$ListMenu),JSON_UNESCAPED_UNICODE);
    //     dd($data);
    // }



    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
