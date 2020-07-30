<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrefixMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "prefix_name_master"; 

    public function patient(){
        return $this->belongsTo('App\PatientMaster');
    }

    public function users(){
        return $this->belongsTo('App\UserMaster');
    }
}
