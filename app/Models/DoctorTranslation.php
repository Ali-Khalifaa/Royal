<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','specialist'];
}
