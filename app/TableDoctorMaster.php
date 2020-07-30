<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableDoctorMaster extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "doctor_master";
}
