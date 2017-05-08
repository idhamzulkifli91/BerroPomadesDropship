<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $fillable = ['user_id','product_id','order_id','quantity','total','status'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }


    public function scopeCheckout($query,$user)
    {
        return $query->where('status',0)->where('user_id',$user);
    }

}
