<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VLabOrderDetail extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "vlab_order_detail";

    public function labMain(){
        return $this->hasOne('App\LabOrderMain','id_lab_order_main','id_lab_order_main');
    }

    public function labitem(){
        return $this->hasOne('App\LabItemMaster','id_lab_item','id_lab_item');
    }

    public function critical(){
        return $this->hasMany('App\critical','order_main_id','id_lab_order_main');
    }
}
