<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = false;

    protected $fillable = array('user_id');
}
