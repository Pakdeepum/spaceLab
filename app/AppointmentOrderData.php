<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentOrderData extends Model
{
    protected $connection = 'mysql';
    protected $table = "appointment_order_data";

    public function doctor(){
        return $this->hasOne('App\DoctorMaster','id_doctor','id_doctor');
    }

    public function labOrderMain(){
        return $this->hasOne('App\LabOrderMain','id_lab_order_main','id_lab_order_main');
    }

    public function labMain(){
        return $this->belongsTo('App\VLabOrderMain');
    }
}
