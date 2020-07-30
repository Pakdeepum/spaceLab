<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectSpecimentNote extends Model
{
    protected $connection = 'mysql';
    protected $table = "specimen_item_reject_note_master"; 
}
