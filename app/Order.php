<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','product_id','total','quantity','payment_evidence','payment_status','order_status','customer_name','customer_contact','customer_address','customer_email'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class,'payment_status','id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class,'order_status','id');
    }


    public function scopeOrder($query,$user)
    {
        return $query->where('user_id',$user);
    }
}
