<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabHistory extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = "lab_result_history";

    public function labDetail(){
        return $this->belongsTo('App\LabOrderDetail');
    }

    public function decimal(){
        return $this->hasOne('App\LabItemMaster','id_lab_item','item_id');
    }
}
