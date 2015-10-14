<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContacts extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    protected $fillable = array('email', 'phone_home', 'phone_mobile');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
