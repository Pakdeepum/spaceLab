<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "doctor_master";

    public function labDetial(){
        return $this->belongsTo('App\LabOrderMain');
    }

    public function appointment(){
        return $this->belongsTo('App\AppointmentOrderData');
    }

    public function prefix(){
        return $this->hasOne('App\PrefixMaster','id_prefix','doctor_prefix');
    }

    public function department(){
        return $this->hasOne('App\DepartmentMaster','id_department','doctor_department');
    }

    public function specialty(){
        return $this->hasOne('App\SpecialtyMaster','id_specialty','doctor_specialty');
    }

    public function hospital(){
        return $this->hasOne('App\HospitalMaster','id_hospital','id_hospital');
    }
}
