<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['address','hourjopone','hourjoptwo','hourjopthree'];

    protected $fillable = [
        'phone', 'email','facebook_link', 'twitter_link', 'linkedin_link','youtube_link','fax','map',
    ];
}
