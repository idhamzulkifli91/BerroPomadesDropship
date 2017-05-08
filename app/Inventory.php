<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id','stock_count','total'];

    public static function boot()
    {
        parent::boot();
        static::created(function($model){
            $model->total = $model->stock_count;
            $model->save();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}