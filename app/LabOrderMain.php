<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabOrderMain extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "lab_order_main"; 

    public function patient(){
        return $this->hasOne('App\PatientMaster','id_patient','id_patient');
    }

    public function doctor(){
        return $this->hasMany('App\DoctorMaster','id_doctor','id_doctor');
    }

    public function detail(){
        return $this->hasMany('App\LabOrderDetail','id_lab_order_main','id_lab_order_main');
    }

    public function hospital(){
        return $this->hasMany('App\HospitalMaster','id_hospital','id_hospital');
    }

    public function appoint(){
        return $this->hasMany('App\AppointmentOrderData','id_appointment','id_appointment');
    }

    public function vLabDetial(){
        return $this->belongsTo('App\VLabOrderDetail');
    }
}
