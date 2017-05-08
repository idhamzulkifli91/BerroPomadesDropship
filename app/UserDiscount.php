<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDiscount extends Model
{
    protected $fillable = ['product_id','role_id','discount'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function afterDiscount($product,$role)
    {
        $deduction  = 0;
        $discount = UserDiscount::where('product_id',$product)->where('role_id',$role);
        if($discount->count()) {

            $itemDiscount = $discount->first();
            $deduction = ($itemDiscount->discount / 100) * $itemDiscount->product->price;
        }

        return $deduction;
    }
}
