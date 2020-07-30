<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VLabOrderMain extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "vlab_order_main"; 
    public function detail(){
        return $this->hasMany('App\LabOrderDetail','id_lab_order_main','id_lab_order_main');
    }
}
