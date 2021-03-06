<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
   protected $fillable = ['product_id','order_id','user_id','product_name','price','description','image','qty'];
}