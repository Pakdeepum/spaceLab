<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "lab_request";
}
