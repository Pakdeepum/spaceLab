<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GatewayLabRequest;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     dd('is contruct home');
    //     $this->middleware('auth');
    //     $this->Auth::user();
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        // $test2 =  DB::connection('mysql2')->table('lab_request')->get()->toArray();
        // $SelectLab = GatewayLabRequest::all();
        // \Log::info('**********',$test2,'**********');
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        $data['groupuser'] = session('Groupuser');
        return view('Welcome',$data);
    }
}
