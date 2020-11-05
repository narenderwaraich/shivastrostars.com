<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetKundli extends Model
{
    protected $fillable = ['name','email','phone_no','gender','db','place','order_id','status'];
}
