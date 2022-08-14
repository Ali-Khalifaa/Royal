<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
}
