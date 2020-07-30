<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VlabItem;
use Carbon\Carbon;
use App\PatientMaster;
use JasperPHP\JasperPHP;
use App\PatientTypeData;
use App\Ward;
use App\LabSubGroupItemMaster;
use App\AnalyzerType;
use PDF;
use File;
use Log;
class ReportController extends Controller
{
    public function getDatabaseConfig()
    {
        return [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/cossou/jasperphp/src/JasperStarter/jdbc'),
            'jdbc_driver' => 'net.sourceforge.jtds.jdbc.Driver',
        ];
    }

    public function patientDairyReport(Request $request){
        $output = public_path() .'/report/'.time() . '_patientDairy';
        $report = new JasperPHP;
        $report->compile(public_path().'/report/PatientDairy.jrxml')->execute();

        $report->process(
            public_path().'/report/PatientDairy.jasper',
            $output,
            array('pdf'),
            array('date' => Carbon::now('Asia/Bangkok')->format('Y-m-d')),
             \Config::get('database.connections.mysql')
        )->execute();
        $file = $output . '.pdf';
        $path = $file;

        if (!file_exists($file)) {
            abort(404);
        }
        $file = file_get_contents($file);
        File::delete($path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
    }

    public function appointment(Request $request){
        $array = [];
        $array[0] = $request->input('doctor_name');
        $array[1] = $request->input('fullname');
        $array[2] = \str_replace("-","/",$request->input('date'));
        $array[3] = $request->input('hour');
        $array[4] = $request->input('minute');
        $array[5] = $request->input('appointmentfor');
        $array[6] = $request->input('laborderno');
        $array[7] = $request->input('note');
        $array[8] = $request->input('department');
        $array[9] = $request->input('specialty');
        $array[10] = $request->input('hospital');
        $array[11] = $request->input('age');
        $array[12] = $request->input('sex') == 1 ? "Male" : "Female";
        $data = [];
        array_push($data,$array);
        $pdf = PDF::loadView('Report.Pdf.appointment',['data'=>$data]);
        return @$pdf->stream();
    }

    public function report1(Request $request){
        $datestart = Carbon::parse($request->input('date_s'))->format('Y-m-d');
        $dateend = Carbon::parse($request->input('date_e'))->format('Y-m-d');
        $hospital = $request->input('hospital');
        $visit = $request->input('visit');
        $ward = $request->input('ward');
        $analyzer = $request->input('analyzer');
        $doctor = $request->input('doctor');
        //Log::Debug('report1 analyzer',$request->all());
        $output = public_path() .'/report/'.time() . '_report1';

        $report = new JasperPHP;
        $report->compile(public_path().'/report/report1.jrxml')->execute();

        $report->process(
            public_path().'/report/report1.jasper',
            $output,
            array('pdf'),
            array(
                'date_start' => $datestart,
                'date_end' => $dateend,
                'hospital'=> $hospital,
                'visit'=> $visit,
                'ward'=> $ward,
                'analyzer' =>$analyzer,
                'doctor' =>$doctor
            ),
            \Config::get('database.connections.mysql')
            )->execute();
			//->output();
			//dd($report);
            $file = $output . '.pdf';
            $path = $file;

            if (!file_exists($file)) {
                abort(404);
            }
            $file = file_get_contents($file);
            //File::delete($path);
            return response($file, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
    }

    public function report2(Request $request){
        $datestart = Carbon::parse($request->input('dateStart'))->format('Y-m-d');
        $dateend = Carbon::parse($request->input('dateEnd'))->format('Y-m-d');
        $analyzer = $request->input('analyzer');
        $doctor = $request->input('doctor');
        $output = public_path() .'/report/'.time() . '_report2-2';

        $report = new JasperPHP;
        $report->compile(public_path().'/report/report2-2.jrxml')->execute();

        $report->process(
            public_path().'/report/report2-2.jasper',
            $output,
            array('pdf'),
            array('datestart' => $datestart,'dateend' => $dateend,'labgroup'=>$request->input('labgroup'),'analyzer'=>$analyzer,'doctor'=>$doctor),
            \Config::get('database.connections.mysql')
            )->execute();
            $file = $output . '.pdf';
            $path = $file;

            if (!file_exists($file)) {
                abort(404);
            }
            $file = file_get_contents($file);
            File::delete($path);
            return response($file, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
        }

        public function report3(Request $request){
            $datestart = Carbon::parse($request->input('date_s'))->format('Y-m-d');
            $dateend = Carbon::parse($request->input('date_e'))->format('Y-m-d');
            $hospital = $request->input('hospital');
            $department = $request->input('department');
            $serviceplan = $request->input('serviceplan');
            $visit = $request->input('visit');
            $ward = $request->input('patient_department');
            $doctor = $request->input('doctor');
            $output = public_path() .'/report/'.time() . '_report3';

            $report = new JasperPHP;
            $report->compile(public_path().'/report/report3.jrxml')->execute();

            $report->process(
                public_path().'/report/report3.jasper',
                $output,
                array('pdf'),
                array(
                    'datestart' => $datestart,
                    'dateend' => $dateend,
                    'hospital'=> $hospital,
                    'department'=> $department,
                    'serviceplan'=> $serviceplan,
                    'visit' => $visit,
                    'ward' => $ward,
                    'doctor'=>$doctor,
                ),
                \Config::get('database.connections.mysql')
                )->execute();

                //dd($report);

                $file = $output . '.pdf';
                $path = $file;

                if (!file_exists($file)) {
                    abort(404);
                }
                $file = file_get_contents($file);
                File::delete($path);
                return response($file, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
        }

        public function report4(Request $request){

            $datestart = Carbon::parse($request->input('dateStart'))->format('Y-m-d');
            $dateend = Carbon::parse($request->input('dateEnd'))->format('Y-m-d');

            $output = public_path() .'/report/'.time() . '_report4';

            $report = new JasperPHP;
            $report->compile(public_path().'/report/report4.jrxml')->execute();

            $user = session('user')->toArray();
            $hospital = $user['id_hospital'];

            $report->process(
                public_path().'/report/report4.jasper',
                $output,
                array('pdf'),
                array('datestart' => $datestart,'dateend' => $dateend,'hospital'=>$hospital
            ,'visit'=>$request->input('visit')),
                \Config::get('database.connections.mysql')
                )->execute();

                $file = $output . '.pdf';
                $path = $file;

                if (!file_exists($file)) {
                    abort(404);
                }
                $file = file_get_contents($file);
                File::delete($path);
                return response($file, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
        }
        public function report5(Request $request){

            $datestart = Carbon::parse($request->input('dateStart'))->format('Y-m-d');
            $dateend = Carbon::parse($request->input('dateEnd'))->format('Y-m-d');

            $output = public_path() .'/report/'.time() . '_report5';

            $report = new JasperPHP;
            $report->compile(public_path().'/report/report5.jrxml')->execute();

            $report->process(
                public_path().'/report/report5.jasper',
                $output,
                array('pdf'),
                array('datestart' => $datestart,'dateend' => $dateend,'department'=>$request->input('department')),
                \Config::get('database.connections.mysql')
                )->execute();
                //dd($report);
                $file = $output . '.pdf';
                $path = $file;

                if (!file_exists($file)) {
                    abort(404);
                }
                $file = file_get_contents($file);
                File::delete($path);
                return response($file, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
        }

        public function report6(Request $request){

            $datestart = Carbon::parse($request->input('dateStart'))->format('Y-m-d');
            $dateend = Carbon::parse($request->input('dateEnd'))->format('Y-m-d');
            $hospital = $request->input('hospital');
            $analyzer = $request->input('analyzer');
            $output = public_path() .'/report/'.time() . '_report6';
            $report = new JasperPHP;
            $report->compile(public_path().'/report/report6.jrxml')->execute();

            $report->process(
                public_path().'/report/report6.jasper',
                $output,
                array('pdf'),
                array(
                    'date_start' => $datestart,
                    'date_end' => $dateend,
                    'hospital'=> $hospital,
                    'analyzer'=> $analyzer
                ),
                \Config::get('database.connections.mysql')
                )->execute();
                //dd($report);

                $file = $output . '.pdf';
                $path = $file;

                if (!file_exists($file)) {
                    abort(404);
                }
                $file = file_get_contents($file);
                File::delete($path);
                return response($file, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
    }

    public function report7(Request $request){
        $datestart = Carbon::parse($request->input('dateStart'))->format('Y-m-d');
        $dateend = Carbon::parse($request->input('dateEnd'))->format('Y-m-d');

        $output = public_path() .'/report/'.time() . '_report7';

        $report = new JasperPHP;
        $report->compile(public_path().'/report/report7.jrxml')->execute();

        $report->process(
            public_path().'/report/report7.jasper',
            $output,
            array('pdf'),
            array('date_start' => $datestart,'date_end' => $dateend,'hospital'=>$request->input('hospital')),
            \Config::get('database.connections.mysql')
            )->execute();

            $file = $output . '.pdf';
            $path = $file;

            if (!file_exists($file)) {
                abort(404);
            }
            $file = file_get_contents($file);
            File::delete($path);
            return response($file, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="cliente.pdf"');
    }

    public function getPatient(Request $request){
        $patient = PatientTypeData::select('*')->get();
        return response()->json(['patient' => $patient]);
    }

    public function getWard(Request $request){
        $ward = Ward::select('*')->get();
        return response()->json(['ward'=> $ward]);
    }
    public function getAnalyzerType(Request $request){
       $analyzerType = AnalyzerType::select('*')->get();
       return response()->json(['analyzer'=>$analyzerType]);
    }

    public function listgroupitem(){
        $data = session('user');
        $group = LabSubGroupItemMaster::where('id_hospital',$data['id_hospital'])->get()->toArray();
        $data = json_encode(array('data'=>$group),JSON_UNESCAPED_UNICODE);
        return $data;
    }
}
