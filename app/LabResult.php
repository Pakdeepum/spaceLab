<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $connection = 'mysql';
    protected $table = "lab_result";
}
