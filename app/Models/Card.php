<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Card extends Model implements AuthenticatableContract,
    AuthorizableContract
{

    use Authenticatable, Authorizable;

    public $incrementing = false;
    public $timestamps = false;


    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function account() {
        return $this->belongsTo(\App\Models\Account::class);
    }

}
