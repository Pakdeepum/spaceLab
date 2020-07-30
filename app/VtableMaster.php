<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VtableMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = "vtable_master";
}
