<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    protected $fillable = [
        'user_id',
        'number_of_questions',
        'correct_questions',
        'percentage',
        'result',
        'next',
        'time',
        'end_time',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}