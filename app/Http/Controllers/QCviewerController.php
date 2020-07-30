<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LabSpecimenItem;
use App\VQcProfile;
use App\VQcViewData;
use App\QcLevel;
use App\QcName;
use Carbon\Carbon;
use DB;

class QCviewerController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }
        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('QC.QC-viewer.QC-viewer',$data);
    }

    public function AAA()
    {
        $test = LabSpecimenItem::All();
        $ttest = json_encode($test);
        return view('QC.QC');
    }

    public function getjson()
    {

        // dd('asdasdas');
        $test = LabSpecimenItem::All();
        $output = json_encode(array('data' => $test));
        return $output;
    }

    public function viewProfile()
    {
        $data = session('user');
        $profile = VQcProfile::where(['stdel'=>0,'id_hospital'=>$data['id_hospital']])->get()->toArray();
        $data = json_encode(array('data'=>$profile),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function getLevel(){
        $level = QcLevel::where('stdel',0)->get();
        return response()->json(['data' => $level]);
    }

    public function getQcName(){
        $qcName = QcName::where('stdel',0)->get();
        return response()->json(['data' => $qcName]);
    }

    public function viewQcResultData(Request $request)    {

        $data = session('user');
        \Log::info('input', [$request]);
        $result = VQcViewData::where(['stdel'=>0,'id_hospital'=>$data['id_hospital'],'isReject'=>0]);
        if($request->has('_profile') && $request->input('_profile') !== null && $request->input('_profile') !== 'undefined'){
            $result->where('id_qc_profile', $request->input('_profile'));
        }
        if($request->has('_level') && $request->input('_level') !== null && $request->input('_level') !== 'undefined'){
            $result->where('id_qc_level', $request->input('_level'));
        }
        if($request->has('_name') && $request->input('_name') !== null && $request->input('_name') !== 'undefined'){
            $result->where('id_qc_name', $request->input('_name'));
        }
        if($request->has('date_s') && $request->input('date_s') !== null && $request->input('date_s') !== 'undefined' && $request->input('date_s') !== 'NaN-NaN-NaN' && $request->input('date_s') > '2000-01-01'){
            $result->where(DB::raw('DATE_FORMAT(qc_test_date,"%Y-%m-%d")'),'>=', $request->input('date_s'));
        }
        if($request->has('date_e') && $request->input('date_e') !== null && $request->input('date_e') !== 'undefined' && $request->input('date_e') !== 'NaN-NaN-NaN' && $request->input('date_e') > '2000-01-01'){
            $result->where(DB::raw('DATE_FORMAT(qc_test_date,"%Y-%m-%d")'), '<=',$request->input('date_e'));
        }
        $result = $result->where('result','!=', '-');
        $result = $result->where('result','!=', null);
        $result = $result->get()->toArray();

        $data = json_encode(array('data'=>$result,'request' => $request->input('date_e')),JSON_UNESCAPED_UNICODE);

        return $data;
    }

    public function viewQcResultDataFillter(Request $request)
    {
        \Log::info('input', [$request]);
        $data = session('user');
        $profile = VQcViewData::where(['stdel'=>0,'id_hospital'=>$data['id_hospital'],'isReject'=>0]);
        if($request->has('_idMain') && $request->input('_idMain') !== null && $request->input('_idMain') !== 'undefined'){
            $profile->where('id_lab_item', $request->input('_idMain'));
        }
        if($request->has('_idQcLevel') && $request->input('_idQcLevel') !== null && $request->input('_idQcLevel') !== 'undefined'){
            $profile->where('id_qc_level', $request->input('_idQcLevel'));
        }
        if($request->has('date_s') && $request->input('date_s') !== null && $request->input('date_s') !== 'undefined' && $request->input('date_s') !== 'NaN-NaN-NaN' && $request->input('date_s') > '2000-01-01'){
            $profile->where(DB::raw('DATE_FORMAT(qc_test_date,"%Y-%m-%d")'),'>=', $request->input('date_s'));
        }
        if($request->has('date_e') && $request->input('date_e') !== null && $request->input('date_e') !== 'undefined' && $request->input('date_e') !== 'NaN-NaN-NaN' && $request->input('date_e') > '2000-01-01'){
            $profile->where(DB::raw('DATE_FORMAT(qc_test_date,"%Y-%m-%d")'), '<=',$request->input('date_e'));
        }
        // $profile = $profile->where('result','!=', '-');
        // $profile = $profile->where('result','!=', null);
        $profile = $profile->get()->toArray();
        $data = json_encode(array('data'=>$profile),JSON_UNESCAPED_UNICODE);
        return $data;
    }


}
