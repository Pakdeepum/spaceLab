<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageuploadController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-upload.management-upload',$data);
    }
}
