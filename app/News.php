<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public $fillable = ['id','title','summary','detail','redactional','publish_date'];
}
