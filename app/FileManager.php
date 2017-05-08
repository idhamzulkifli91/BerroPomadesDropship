<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class FileManager extends Model
{
    protected $fillable = ['name','document_path','type','size','status'];


    public function getSizeAttribute($value)
    {
        return (double) ($value / 1000) / 1000;
    }

    public function getDocumentPathAttribute($value)
    {
        return Config::get('app.domain_url').'/'.$value;
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {

            case 1:
                return 'Published';
            break;
            default:
                return 'Draft';
            break;
        }
    }
}
