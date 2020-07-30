<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabSpecimenItem extends Model
{
    protected $connection = 'mysql';
    protected $table = "lab_specimen_item_master";
    public function labitem(){
        return $this->belongsTo('App\LabItemMaster','id_lab_specimen_item' ,'id_lab_specimen_item' );
    }
}
