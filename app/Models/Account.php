<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $timestamps = false;

    public function chart() {
        return $this->belongsTo(\App\Models\AccountCharts::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function currency() {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_code');
    }
}
