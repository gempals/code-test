<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_file extends Model
{
    //
    protected $fillable = ['message_id','inbox_id','division_id','expired_date',
                           'media_id','status','start_date','due_date',
                           'date_out','date_in','handled_out','handled_out_name',
                           'handled_in','handled_in_name'];

    public function RequestDetail(){
        return $this->hasOne(RequestDetail::class);
    }

    public function inbox(){
    	return $this->hasOne(Inbox::class,'id','inbox_id');
    }

    public function media(){
      return $this->belongsTo(Media::class);
    }

    public function message(){
    	return $this->belongsTo(Message::class);
    }

}
