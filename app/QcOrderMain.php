<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QcOrderMain extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_qc_profile_order',
        'id_qc_profile_main', 
        'qc_test_date', 
        'qc_test_time',
        'id_user_qc',
        'id_username'
    ];
    
    public $timestamps = false;
    protected $table = "qc_order_main"; 

    public function labItem(){
        return $this->hasMany('App\QcOrderDetail','id_qc_profile_order','id_qc_profile_order');
    }
}
