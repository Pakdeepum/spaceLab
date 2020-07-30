<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "department_master"; 
}
