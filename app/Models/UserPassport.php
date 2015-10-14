<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPassport extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = array('series', 'number', 'passport_id', 'issued_organization', 'issue_date');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
