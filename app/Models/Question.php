<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $guarded = [];
    public    $primaryKey='id';
    protected $fillable = [
        'question',
    ];
    protected $appends = [
        'chooses'
    ];

    public function getChoosesAttribute()
    {
        return $this->answers()->get();
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');

    }
}
