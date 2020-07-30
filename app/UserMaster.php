<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "user_master"; 

    public function prefixName(){
        return $this->hasOne('App\PrefixMaster','id_prefix','prefix_name');
    }
}
