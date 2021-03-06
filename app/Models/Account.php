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

    public function credits() {
        return $this->belongsToMany(\App\Models\Credit::class);
    }

    public function scopeMain($query) {
        return $query->where('type_id', 1);
    }

    public function scopePercent($query) {
        return $query->where('type_id', 2);
    }

    public function scopeChart1010($query) {
        return $query->where('chart_id', 1010);
    }

    public function scopeChart7327($query) {
        return $query->where('chart_id', 7327);
    }

}
