<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabOrderDetail extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "lab_order_detail";

    public function order(){
        return $this->belongsTo('App\LabOrderMain','id_lab_order_main','id_lab_order_main');
    }

    public function labItem(){
        return $this->hasOne('App\LabItemMaster','id_lab_item','id_lab_item');
    }

    public function roles(){
        return $this->hasOne('App\UserMaster','id_user','report_id_user');
    } 
    public function rolesEdit(){
      return $this->hasOne('App\UserMaster','id_user','edit_id_user');
    }

    public function approve(){
        return $this->hasOne('App\UserMaster','id_user','approve_id_user');
    }
    public function editApprove(){
        return $this->hasOne('App\UserMaster','id_user','edit_approve_id_user');
    }

    public function history(){
        return $this->hasMany('App\LabHistory','id_lab_order_detail','lab_detail_id');
    }
}
