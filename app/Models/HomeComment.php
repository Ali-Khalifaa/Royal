<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeComment extends Model
{
    protected $fillable = [
        'full_name','email', 'phone', 'subject','message'
    ];
}
