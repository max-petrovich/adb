<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = array('work_place', 'position', 'salary');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
