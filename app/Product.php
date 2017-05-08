<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name','price' ,'description','image','status'];


    public function scopePublished($query)
    {
        $query->where('product_status_id',2);
    }

    public function scopeDraft($query)
    {
        $query->where('product_status_id',1);
    }

    public function productStatus()
    {
        return $this->belongsTo(GenericStatus::class,'product_status_id','id');
    }

}
