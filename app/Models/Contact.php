<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Contact extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title','desc','address'];
    protected $fillable = [
        'phone_one','phone_two'
    ];
    // public function ContactComment()
    // {
    //  return $this->hasMany('App\Models\ContactComment');
 
    // }
}
