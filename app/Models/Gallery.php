<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Gallery extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $fillable = [
        'img'
    ];
}
