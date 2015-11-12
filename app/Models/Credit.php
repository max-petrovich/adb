<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public $timestamps = false;

    protected $fillable = array('user_id','rate_id', 'type_id', 'contract_id', 'currency_code', 'date_start', 'date_expiration', 'contract_term', 'amount');

    public function setDateExpirationAttribute() {
        $creditRate = CreditRate::where(['id' => $this->attributes['rate_id'], 'type_id' => $this->attributes['type_id'] ])->first();
        $this->attributes['date_expiration'] = Carbon::parse($this->attributes['date_start'])->addDays($creditRate->term)->format("Y-m-d");
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
        return $this->belongsTo(\App\Models\CreditType::class);
    }

    public function rate() {
        return $this->belongsTo(\App\Models\CreditRate::class);
    }

    public function scopeActive($query) {
        return $query
            ->where('date_start', '<=', Carbon::create()->format('Y-m-d'))
            ->orWhere(function ($query){
                $query->where('date_expiration', '>', Carbon::create()->format('Y-m-d'))
                    ->orWhere('date_expiration', null);
            });
    }
}
