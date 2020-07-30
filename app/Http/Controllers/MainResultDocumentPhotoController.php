<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VLabOrderMain;
use App\LabDocumentPhotoList;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDF;

class MainResultDocumentPhotoController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('main.result-document-photo.result-document-photo',$data);
    }

    public function SelectLab()
    {
        $DataLab = LabDocumentPhotoList::All();
        $data = json_encode(array('data'=>$DataLab),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabData($labID)
    {
        $DataLab = LabDocumentPhotoList::select('width','height','id_number_photo', 'lab_order_no', 'id_hospital', 'filename', 'note', 'id_lab_order_main', 'hn', 'patient_firstname', 'patient_lastname', 'gender', 'age', 'order_date')->where('id_lab_order_main',$labID)->get()->toArray();
        $DataLab2 = LabDocumentPhotoList::select( 'filename')
        ->where('id_lab_order_main',$labID)
        ->get()->toArray();
         //dd($DataLab2);
        $newarray=[];
        foreach($DataLab as $key => $val){
            $newarray[] = $val['filename'];
        }
        $valarray[] = $DataLab[0];
        foreach($newarray as $keys => $vals){
             //array_push($valarray[0],$vals);
        }
        $DataMerge = array_merge($valarray,$newarray);
        $data = json_encode(array('data'=>$DataMerge),JSON_UNESCAPED_UNICODE);
        //dd($data);*/
        //$data = json_encode(array('data'=>$DataLab2),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function printImage(Request $request){
        $lab = LabDocumentPhotoList::select('width','height','id_number_photo', 'lab_order_no', 'id_hospital', 'filename', 'note', 'id_lab_order_main', 'hn', 'prefix_name', 'patient_firstname', 'patient_lastname', 'gender', 'age', 'order_date')
        ->where('id_lab_order_main', $request->input('_id'))
        ->where('filename', $request->input('_pic_num'))->get();
        //dd($lab);
        
        $pdf = PDF::loadView('main.result-document-photo.printImage.print',['dataLab'=>$lab]);
        return @$pdf->stream();
    }
}
