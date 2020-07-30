<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\VLabOrderMain;
use App\LabResultPhotoDetail;
use App\LabDocumentPhotoList;
use File;
use Illuminate\Support\Facades\Log;
use PDF;

class MainResultCopyController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('main.result-copy.result-copy-scan',$data);
    }

    public function SelectLab()
    {
        $DataLab = VLabOrderMain::All();
        $data = json_encode(array('data'=>$DataLab),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabData(int $labID)
    {
        $DataLab = VLabOrderMain::select('id_lab_order_main', 'lab_order_no', 'id_hospital', 'hn', 'patient_firstname', 'patient_lastname', 'gender', 'age', 'order_date')->where('id_lab_order_main',$labID)->get()->toArray();
        $data = json_encode(array('data'=>$DataLab),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function uploadFile(Request $request)
    {
        $idHospital = $request->input('hiddenHospitalID');
        $labNo = $request->input('hiddenLabNo');
        $labID = $request->input('hiddenLabID');
        $pictureNote = $request->input('pictureNote');

        $foldersAll = Storage::allDirectories(public_path().'/storage/img/LabResult');
        $filesAll = Storage::files(public_path().'/storage/img/LabResult/');
        $folderID = Storage::directories(public_path().'/storage/img/LabResult/'.$idHospital.'/');
        $folderLab = Storage::directories(public_path().'/storage/img/LabResult/'.$idHospital.'/'.$labNo);
        $fileID = Storage::files(public_path().'/storage/img/LabResult/'.$idHospital.'/');
        $fileLab = Storage::files(public_path().'/storage/img/LabResult/'.$idHospital.'/'.$labNo);

        $allFilesName = [];
        for($i = 0; $i < count($filesAll); $i++) {
            $allFilesName[] = basename($filesAll[$i]);
        }

        $allFoldersName = [];
        for($i = 0; $i < count($foldersAll); $i++) {
            $allFoldersName[] = basename($foldersAll[$i]);
        }

        $foldersCountID = [];
        for($i = 0; $i < count($folderID); $i++) {
            $fileNameCount[] = basename($folderID[$i]);
        }

        $filesNameCountID = [];
        for($i = 0; $i < count($fileID); $i++) {
            $fileNameCount[] = basename($fileID[$i]);
        }

        $foldersCountLab = [];
        for($i = 0; $i < count($folderLab); $i++) {
            $fileNameCount[] = basename($folderLab[$i]);
        }

        $filesNameCountLab = [];
        for($i = 0; $i < count($fileLab); $i++) {
            $fileNameCount[] = basename($fileLab[$i]);
        }

        $filenameID = count($fileID) + 1;
        $filenameLab = count($fileLab) + 1;
        // find hospital id compare folder name
        for($j = 0; $j <= count($fileLab)+1; $j++) {
            // in case have no folder
            // have nothing
            if($foldersCountID == NULL) {
                //File::makeDirectory(public_path().'/storage/img/LabResult/'.$idHospital.'/'.$labNo, 0777,true);
                // save image to server
                if($request->hasFile('photo')){
                    $filenameLab = base64_encode($request->input($filenameLab).$filenameLab.str_random(3)).".jpg";
                    $path = $request->file('photo')->move(public_path('/storage/img/LabResult/'.$idHospital.'/'.$labNo), $filenameLab);
                    break;
                }
            }
            // incase have lab order folder
            else if($foldersCountLab[$j] == $labNo){
                if($request->hasFile('photo')){
                    $filenameLab = base64_encode($request->input($filenameLab).$filenameLab.str_random(3)).".jpg";
                    $path = $request->file('photo')->move(public_path('/storage/img/LabResult/'.$idHospital.'/'.$labNo), $filenameLab);
                    break;
                }
            }
            // incase finish loop but still have no folder
            else if($j == count($fileLab)+1) {
                //File::makeDirectory(public_path().'/storage/img/LabResult/'.$idHospital.'/'.$labNo,0777,true);
                // save image to server
                if($request->hasFile('photo')){
                    $filenameLab = base64_encode($request->input($filenameLab).$filenameLab.str_random(3)).".jpg";
                    $path = $request->file('photo')->move(public_path('/storage/img/LabResult/'.$idHospital.'/'.$labNo), $filenameLab );
                    break;
                }
            }
        }
        //$request = $request->all();
        $dataDetail = LabResultPhotoDetail::insert([
            'id_lab_order_main'=>$labID,
            'filename'=>$filenameLab,
            'note'=>$pictureNote,
            'height' => $request->input('image_height'),
            'width' => $request->input('image_width'),
        ]);
        return redirect()->back();
    }
    public function printImage(Request $request){
        // $request = $request->all();
        \Log::Debug('print img request is',[$request->input('_labNo')]);
        // return $request->route('lab_order_no');
        $lab = VLabOrderMain::select('id_lab_order_main', 'lab_order_no', 'id_hospital', 'hn', 'patient_firstname', 'patient_lastname', 'gender', 'age', 'order_date')
        // ->where('id_hospital', $request->input('hiddenHospitalID'))
        ->where('lab_order_no',$request->input('_labNo'))->get();


        // ->where('id_lab_order_main',$request->input('hiddenLabID'))
        // ->where('note', $request->input('pictureNote'));
        $lab['image'] = $request->input('image');
        $lab['imageDescription'] = $request->input('imageDescription');
        $lab['imageHeight'] = $request->input('imageHeight');
        $lab['imageWidth'] = $request->input('imageWidth');

        \Log::Debug('data lab is',[$lab['imageHeight']]);
        $pdf = PDF::loadView('main.result-copy.printImage2.print',['dataLab'=>$lab]);
        
        return @$pdf->stream();
    }
}
