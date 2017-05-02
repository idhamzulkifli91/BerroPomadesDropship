<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','body','slug_path','status'];


    public function setSlugPathAttribute($value)
    {
        $this->attributes['slug_path'] = str_slug($value) .'-'.str_random(10);
    }
}
