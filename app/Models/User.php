<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $fillable = array('last_name','first_name','middle_name', 'birth_date', 'sex', 'marital_status_id', 'nationality_id');

    public function scopeEagerLoadAll($query) {
        return $query->with('contacts', 'location', 'passport', 'socialInfo', 'work');
    }


    public function contacts() {
        return $this->hasOne(\App\Models\UserContacts::class);
    }

    public function location() {
        return $this->hasOne(\App\Models\UserLocation::class);
    }

    public function passport() {
        return $this->hasOne(\App\Models\UserPassport::class);
    }

    public function socialInfo() {
        return $this->hasOne(\App\Models\UserSocialInfo::class);
    }

    public function work() {
        return $this->hasOne(\App\Models\UserWork::class);
    }

    public function getFIO() {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }
}
