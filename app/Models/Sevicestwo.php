<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Sevicestwo extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name','title_one','title_two','title_three','title_four','desc','title_fiv','title_six'];
    protected $fillable = [
        'img'
    ];
}
