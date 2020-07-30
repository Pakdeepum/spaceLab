<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMaster;
use App\PatientMaster;
use App\Vpatient;
use App\EthnicityMaster;
use App\NationalityMaster;
use App\ReligionMaster;
use App\ProvinceMaster;
use App\AmphurMaster;
use App\DistrictMaster;
use App\PatientTypeData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;
use Carbon\Carbon;
use App\DoctorMaster;
use App\PrefixMaster;
use Illuminate\Support\Facades\Input;

class ManagepatientController extends Controller
{
    public function index()
    {
        if(session('user') == null){
            return redirect('/login');
        }

        $data['alluser'] = PatientMaster::all()->toArray();

        $listmenu = session('listmenu');
        $data['listmenu'] = $listmenu;
        $data['user'] = session('user');
        return view('management.management-patient.management-patient',$data);
    }

    public function listPatient(string $dataSeach)
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        //echo "<script>console.log($IDhospital)</script>";
        $sql_str = " select * from vpatient where (hn like '%".$dataSeach."%' or patient_firstname like '%".$dataSeach."%'  or patient_lastname like '%".$dataSeach."%' or citizenid like '%".$dataSeach."%') and id_hospital = ".$IDhospital." and stdel != 1 order by id_patient ASC";
        $allPatientDB = DB::select(DB::raw($sql_str));
        $allPatient = json_encode(array('data'=>$allPatientDB),JSON_UNESCAPED_UNICODE);
        return $allPatient;
    }
    public function listPatientAll()
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        //echo "<script>console.log($IDhospital)</script>";
        $sql_str = " select * from vpatient where id_hospital = ".$IDhospital." and stdel != 1 order by id_patient DESC";
        $allPatientDB = DB::select(DB::raw($sql_str));
        $allPatient = json_encode(array('data'=>$allPatientDB),JSON_UNESCAPED_UNICODE);
        return $allPatient;
    }
    public function ethnicityMasterData()
    {
        $ethnicityData = EthnicityMaster::All();
        $data = json_encode(array('data'=>$ethnicityData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function nationalityMasterData()
    {
        $nationalityData = NationalityMaster::All();
        $data = json_encode(array('data'=>$nationalityData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function religionMasterData()
    {
        $religionData = ReligionMaster::All();
        $data = json_encode(array('data'=>$religionData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function provinceMasterData()
    {
        $provinceData = ProvinceMaster::All();
        $data = json_encode(array('data'=>$provinceData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function amphurMasterData(int $provinceID)
    {
        $amphurData = AmphurMaster::select('amphur_id', 'amphur_name_en', 'province_id')->where('province_id',$provinceID)->get()->toArray();
        $data = json_encode(array('data'=>$amphurData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function districtMasterData(int $amphurID)
    {
        $districtData = DistrictMaster::select('district_id', 'district_name_en', 'amphur_id')->where('amphur_id',$amphurID)->get()->toArray();
        $data = json_encode(array('data'=>$districtData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function PatientTypeData()
    {
        $PatientTypeData = PatientTypeData::All();
        $data = json_encode(array('data'=>$PatientTypeData),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function DeletePatient(int $patientID)
    {
        $data = PatientMaster::where('id_patient',$patientID)->update(['stdel'=>1]);
        return $data;
    }

    private function createName($file){
        $filename = null;
        /**create new the image name*/
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time();
        $filename = base64_encode($filename.str_random(3));
        $filename = $filename.'.'.$file->getClientOriginalExtension();
        return $filename;
    }

    public function AddPatient(Request $request)
    {
        $user = session('user');
        $IDhospital = $user['id_hospital'];
        if($request->hasFile('image')) {
            // save file image
            $dataPatient = PatientMaster::select('id_patient')->where('id_hospital', $user['id_hospital'])->get()->toArray();
            $lengthArray = count($dataPatient);
            $lengthArray = $lengthArray - 1 ;
            //dd($lengthArray);
            $idPatient = $dataPatient[$lengthArray];
            $idPatient = $idPatient['id_patient'];

            /**save image patient */
            $images = $this->createName( $request->file('image'));
            $path = $request->file('image')->move('storage/img/patient/', $images);

            /**insert patient */
            PatientMaster::insert([
                "id_hospital" => $IDhospital,
                "hn" => $request['HNumber'],
                "citizenid" => $request['IDnumberAdd'],
                "prefix_name" => $request['PrefixAdd'],
                "patient_firstname" => $request['firstNameAdd'],
                "patient_lastname" => $request['lastNameAdd'],
                "patient_tel" => $request['telNoAdd'],
                "patient_email" => $request['emailAdd'],
                "birthday" => $request['birthDayAdd'],
                "gender" => $request['genderAdd'],
                "blood_group" => $request['bloodGroupAdd'],
                "marital_status" => $request['statusAdd'],
                "ethnicity" => $request['ethnicityAdd'],
                "nationality" => $request['nationalityAdd'],
                "patient_religion" => $request['religionAdd'],
                "father_name" => $request['fatherNameAdd'],
                "mother_name" => $request['motherNameAdd'],
                "patient_zipcode" => $request['zipcodeAdd'],
                "patient_province" => $request['provinceAdd'],
                "patient_amphur" => $request['amphurAdd'],
                "patient_district" => $request['districtAdd'],
                "patient_address" => $request['addressAdd'],
                "weight" => $request['weightAdd'],
                "height" => $request['heightAdd'],
                "patient_type" => $request['typeAdd'],
                "drug_allergy" => $request['medAllergyAdd'],
                "private_docter_id" => $request['iddoctor'],
                "regis_date" => Carbon::now('Asia/Bangkok'),
                "image" => $images,
                "id_user" => $user['id_user']
            ]);
        }
        // have no image file
        else {
            $request = $request->All();
            PatientMaster::insert([
                "id_hospital" => $IDhospital,
                "hn" => $request['HNumber'],
                "citizenid" => $request['IDnumberAdd'],
                "prefix_name" => $request['PrefixAdd'],
                "patient_firstname" => $request['firstNameAdd'],
                "patient_lastname" => $request['lastNameAdd'],
                "patient_tel" => $request['telNoAdd'],
                "patient_email" => $request['emailAdd'],
                "birthday" => $request['birthDayAdd'],
                "gender" => $request['genderAdd'],
                "blood_group" => $request['bloodGroupAdd'],
                "marital_status" => $request['statusAdd'],
                "ethnicity" => $request['ethnicityAdd'],
                "nationality" => $request['nationalityAdd'],
                "patient_religion" => $request['religionAdd'],
                "father_name" => $request['fatherNameAdd'],
                "mother_name" => $request['motherNameAdd'],
                "patient_zipcode" => $request['zipcodeAdd'],
                "patient_province" => $request['provinceAdd'],
                "patient_amphur" => $request['amphurAdd'],
                "patient_district" => $request['districtAdd'],
                "patient_address" => $request['addressAdd'],
                "weight" => $request['weightAdd'],
                "height" => $request['heightAdd'],
                "patient_type" => $request['typeAdd'],
                "drug_allergy" => $request['medAllergyAdd'],
                "private_docter_id" => $request['iddoctor'],
                "regis_date" => Carbon::now('Asia/Bangkok'),
                "id_user" => $user['id_user']
            ]);
        }
        return redirect()->back();
    }

    public function EditPatient(int $patientID)
    {
        $allPatient = Vpatient::where('id_patient',$patientID)->get()->toArray();
        $doctor = DoctorMaster::select('doctor_prefix', 'doctor_name', 'doctor_lastname')->where('id_doctor',$allPatient[0]['private_docter_id'])->get()->toArray();
        $prefix = PrefixMaster::select('prefix_name')->where('id_prefix',$doctor[0]['doctor_prefix'])->get()->toArray();
        foreach($allPatient as $patient => $a) {
            foreach($doctor as $doc => $b) {
                foreach($prefix as $pf => $c)
                    $newdata= array_merge($a,$b,$c);
            }
        }
        $data = json_encode(array('data'=>$newdata),JSON_UNESCAPED_UNICODE);
        //dd($data);
        return $data;
    }

    public function SaveEditPatient(Request $request)
    {
        //dd($request);
        $idPatient = $request['idpatientEdit'];
        $destination = public_path('storage/img/patient/');
        if($request->hasFile('image_e')) {
            /**delete o file */
            $delete = $destination.$request->input('ofile_e');
            if(file_exists($delete)){
                File::delete($delete);
            }
            /**save image patient */
            $images = $this->createName( $request->file('image_e'));
            $path = $request->file('image_e')->move('storage/img/patient/', $images);

            /**update patient */
            PatientMaster::where('id_patient',$idPatient)->update([
                "citizenid" => $request['IDnumberEdit'],
                "hn" => $request['HNumber'],
                "prefix_name" => $request['PrefixEdit'],
                "patient_firstname" => $request['firstNameEdit'],
                "patient_lastname" => $request['lastNameEdit'],
                "patient_tel" => $request['telNoEdit'],
                "patient_email" => $request['emailEdit'],
                "birthday" => $request['birthDayEdit'],
                "gender" => $request['genderEdit'],
                "blood_group" => $request['bloodGroupEdit'],
                "marital_status" => $request['statusEdit'],
                "ethnicity" => $request['ethnicityEdit'],
                "nationality" => $request['nationalityEdit'],
                "patient_religion" => $request['religionEdit'],
                "father_name" => $request['fatherNameEdit'],
                "mother_name" => $request['motherNameEdit'],
                "patient_zipcode" => $request['zipcodeEdit'],
                "patient_province" => $request['provinceEdit'],
                "patient_amphur" => $request['amphurEdit'],
                "patient_district" => $request['districtEdit'],
                "patient_address" => $request['addressEdit'],
                "weight"  => $request['weightEdit'],
                "height" => $request['heightEdit'],
                "patient_type" => $request['typeEdit'],
                "drug_allergy" => $request['medAllergyEdit'],
                "private_docter_id" => $request['iddoctor'],
                "image" => $images,
                "last_update" =>Carbon::now('Asia/Bangkok')
            ]);
        }
        // have no image file
        else {
            $request = $request->All();
            // update in sql
            PatientMaster::where('id_patient',$idPatient)->update([
                "citizenid" => $request['IDnumberEdit'],
                "hn" => $request['HNumber'],
                "prefix_name" => $request['PrefixEdit'],
                "patient_firstname" => $request['firstNameEdit'],
                "patient_lastname" => $request['lastNameEdit'],
                "patient_tel" => $request['telNoEdit'],
                "patient_email" => $request['emailEdit'],
                "birthday" => $request['birthDayEdit'],
                "gender" => $request['genderEdit'],
                "blood_group" => $request['bloodGroupEdit'],
                "marital_status" => $request['statusEdit'],
                "ethnicity" => $request['ethnicityEdit'],
                "nationality" => $request['nationalityEdit'],
                "patient_religion" => $request['religionEdit'],
                "father_name" => $request['fatherNameEdit'],
                "mother_name" => $request['motherNameEdit'],
                "patient_zipcode" => $request['zipcodeEdit'],
                "patient_province" => $request['provinceEdit'],
                "patient_amphur" => $request['amphurEdit'],
                "patient_district" => $request['districtEdit'],
                "patient_address" => $request['addressEdit'],
                "weight"  => $request['weightEdit'],
                "height" => $request['heightEdit'],
                "patient_type" => $request['typeEdit'],
                "drug_allergy" => $request['medAllergyEdit'],
                "private_docter_id" => $request['iddoctor'],
                "last_update" =>Carbon::now('Asia/Bangkok')
            ]);
        }
        return redirect()->back();
    }
}
