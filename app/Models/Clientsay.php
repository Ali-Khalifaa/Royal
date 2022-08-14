<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Clientsay extends Model implements TranslatableContract
{  
    use Translatable;
    public $translatedAttributes = ['name','desc'];
    protected $fillable = [
        'img'
    ];
    
}
