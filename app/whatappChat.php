<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class whatappChat extends Model
{
    protected $fillable = ['order_id','name','phone','message'];
}
