<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabItemMaster extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "lab_item_master";

    public function labOrderDetail(){
        return $this->belongsTo('App\LabOrderDetail');
    }

    public function subGroup(){
        return $this->hasOne('App\LabSubGroupItemMaster' ,'id_lab_sub_group_item' ,'id_lab_item_sub_group');
    }
    public function specimen(){
        return $this->hasOne('App\LabSpecimenItem' ,'id_lab_specimen_item' ,'id_lab_specimen_item');
    }

}
