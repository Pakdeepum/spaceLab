<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTestLabItem extends Model
{
    //
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "profile_test_lab_item";

    public function profileTestItemDetail(){
        return $this->hasMany('App\ProfileTestLabItemDetail','id_profile_test_lab_item','id_profile_test');
    }
}
