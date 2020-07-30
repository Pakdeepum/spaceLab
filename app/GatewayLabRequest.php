<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatewayLabRequest extends Model
{
    protected $connection = 'mysql2';
    protected $table = "lab_request";
    protected $fillable = [
        'lab_request_id', 'lab_request_lon', 'lab_request_msg_type','lab_request_data'
    ];
}
