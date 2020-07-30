<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileQcMaster extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "profile_qc_master";
    
    public function profileItem(){
        return $this->hasMany('App\ProfileQcItemDetail','id_profile_qc_main','id_profile_qc');
    }
}
