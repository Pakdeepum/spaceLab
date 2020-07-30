<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabSubGroupItemMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "lab_sub_group_item_master"; 

    public function labitem(){
        return $this->belongsTo('App\LabItemMaster','id_lab_item_sub_group' ,'id_lab_sub_group_item' );
    }
}
