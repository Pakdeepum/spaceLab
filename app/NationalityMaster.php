<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalityMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "nationality_master";

    public function patient(){
        return $this->belong('App\PatientMaster');
    }
}
