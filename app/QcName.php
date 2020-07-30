<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QcName extends Model
{
    protected $connection = 'mysql';
    protected $table = "qc_name_master"; 
}
