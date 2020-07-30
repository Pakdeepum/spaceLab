<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMaster extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "patient_master";
    
    public function ordermain(){
        return $this->belongsTo('App\LabOrderMain');
    }

    public function labOrderMain(){
        return $this->belongsTo('App\VLabOrderMain');
    }

    public function prefix(){
        return $this->hasOne('App\PrefixMaster','id_prefix','prefix_name');
    }

    public function nationality(){
        return $this->hasOne('App\NationalityMaster','id_nationality','nationality');
    }
}