<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "table_system_master";
}
