<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileQcItemDetail extends Model
{
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $table = "profile_qc_item_detail";
}
