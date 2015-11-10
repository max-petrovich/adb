<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = array('id','user_id','chart_id', 'type_id', 'debit', 'credit', 'currency_code');

    public function chart() {
        return $this->belongsTo(\App\Models\AccountCharts::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function currency() {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_code');
    }

    public function deposits() {
        return $this->belongsToMany(\App\Models\Deposit::class);
    }

}
