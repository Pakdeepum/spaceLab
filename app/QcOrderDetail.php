<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QcOrderDetail extends Model
{
    protected $connection = 'mysql';
    protected $table = "qc_order_detail"; 

    public function orderMain(){
        return $this->belongsTo('App\QcOrderMain');
    }
}
