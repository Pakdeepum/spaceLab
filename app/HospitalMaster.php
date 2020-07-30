<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "hospital_master";
    
    public function labMaster(){
        return $this->belongsTo('App\LabOrderMain');
    }
}
