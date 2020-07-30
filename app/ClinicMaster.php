<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "clinic_master";
}
