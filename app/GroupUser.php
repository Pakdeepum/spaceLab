<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $connection = 'mysql';
    protected $table = "group_user_master";

}
