<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['key','value'];

    public function value($key)
    {
        $data = self::where('key',$key)->first();
        return is_null($data) ?  null : $data->value;
    }
}
