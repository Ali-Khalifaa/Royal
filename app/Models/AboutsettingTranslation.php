<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutsettingTranslation extends Model
{ 
    public $timestamps = false;
    protected $fillable = ['name','title_one','title_two','title_three','title_four','desc'];
}
