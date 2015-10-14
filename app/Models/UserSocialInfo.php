<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialInfo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = array('reservist', 'pensioner', 'disability_id');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
