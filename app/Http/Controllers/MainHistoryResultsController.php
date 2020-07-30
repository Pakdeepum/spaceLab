<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VLabOrderMain;
use App\VLabOrderDetail;
use App\LabOrderDetail;
use App\LabOrderMain;
use App\LabHistory;
use App\LabItemMaster;

class MainHistoryResultsController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('main.history-results.history-results',$data);
    }

    public function SelectLab()
    {
        $SelectLab = VLabOrderMain::select('*')->with('detail')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$SelectLab),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabData(int $labID)
    {
        $SelectLabData = VLabOrderMain::select('*')->where('id_lab_order_main',$labID)->get()->toArray();
        $data = json_encode(array('data'=>$SelectLabData),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabItem(int $labID)
    {
        $SelectLabData = VLabOrderDetail::select('*')->leftJoin('lab_item_master', 'vlab_order_detail.id_lab_item', '=', 'lab_item_master.id_lab_item')
        ->with('labitem')->where('id_lab_order_main',$labID)->orderBy('vlab_order_detail.ordered')->get()->toArray();
        $data = json_encode(array('data'=>$SelectLabData),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SelectLabItemByID(int $labID)
    {
        $labData = LabOrderMain::join('lab_order_detail as lab_d','lab_d.id_lab_order_main', '=','lab_order_main.id_lab_order_main')
        ->join('lab_item_master as labItem','labItem.id_lab_item','=','lab_d.id_lab_item')
        ->where('lab_d.id_lab_order_detail',$labID)->orderBy('ordered')->get()->toArray();

        $idlabitemdata = $labData[0]['id_lab_item'];
        $idpatient = $labData[0]['id_patient'];

        $data2 = LabOrderMain::with(['detail' => function($q)use($idlabitemdata){
            $q->where('id_lab_item',$idlabitemdata);
        }])->where('id_patient',$idpatient)->orderBy('ordered')->get()->toArray();
        $data = json_encode(array('data'=>$data2),JSON_UNESCAPED_UNICODE);

        return $data;
    }

    public function getHistory(int $labID, int $patientId){
        \Log::info('input',[$labID, $patientId]);
        $labResult = LabHistory::with('decimal')->where('item_id', $labID)
        ->where('patient_id',$patientId)->orderBy('created_at')->get();
        \Log::info('data',[$labResult]);
        return $labResult;   
    }
}
