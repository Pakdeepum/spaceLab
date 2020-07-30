<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QcLevel extends Model
{
    protected $connection = 'mysql';
    protected $table = "qc_level_master"; 
}
