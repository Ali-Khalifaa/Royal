<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientsayTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','desc'];
}
