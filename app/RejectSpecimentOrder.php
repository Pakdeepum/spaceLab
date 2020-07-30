<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectSpecimentOrder extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "specimen_item_reject_order"; 
}
