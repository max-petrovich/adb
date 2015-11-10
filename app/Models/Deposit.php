<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public $timestamps = false;

    protected $fillable = array('user_id','rate_id', 'type_id', 'contract_id', 'currency_code', 'date_start', 'date_expiration', 'contract_term', 'amount');

    public function setDateExpirationAttribute() {
        if ($this->attributes['type_id'] == 1) {
            $this->attributes['date_expiration'] = NULL;
        } else {
            $depositRate = DepositRate::where(['id' => $this->attributes['rate_id'], 'type_id' => $this->attributes['type_id'] ])->first();
            $this->attributes['date_expiration'] = Carbon::parse($this->attributes['date_start'])->addDays($depositRate->term)->format("Y-m-d");
        }
    }

    public function accounts() {
        return $this->belongsToMany(\App\Models\Account::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function currency() {
        return $this->belongsTo(\App\Models\Currency::class, 'currency_code');
    }

    public function type() {
        return $this->belongsTo(\App\Models\DepositType::class);
    }

    public function rate() {
        return $this->belongsTo(\App\Models\DepositRate::class);
    }
}
