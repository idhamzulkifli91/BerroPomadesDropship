<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'name','description','value'];


    protected function currency()
    {
       return 1;
    }
}
