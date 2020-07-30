<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientTypeData extends Model
{
    protected $connection = 'mysql';
    protected $table = "patient_type";
}
