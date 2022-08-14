<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Doctor extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name','specialist'];
    protected $fillable = [
        'img','facebook_link', 'twitter_link', 'linkedin_link','youtube_link'
    ];
}
