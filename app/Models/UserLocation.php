<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = array('birth_place', 'actual_city_id', 'actual_address', 'residence_city_id', 'residence_address');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
