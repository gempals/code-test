<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_activity extends Model
{
    //
    protected $fillable = ['user_id', 'log'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
