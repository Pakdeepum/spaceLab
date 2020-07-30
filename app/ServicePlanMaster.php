<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePlanMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "service_plan_master";
}
