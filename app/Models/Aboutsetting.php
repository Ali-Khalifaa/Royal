<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Aboutsetting extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name','title_one','title_two','title_three','title_four','desc'];
    protected $fillable = [
        'img'
    ];
}
