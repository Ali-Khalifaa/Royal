<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomespecialistTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','specialist'];
}
