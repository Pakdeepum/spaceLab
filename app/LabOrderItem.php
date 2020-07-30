<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabOrderItem extends Model
{
    protected $connection = 'mysql';
    protected $table = "lab_order_item";

    public $timestamps = false;
}
