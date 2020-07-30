<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HISreportController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('report.HIS-report.HIS-report',$data);
    }
}
