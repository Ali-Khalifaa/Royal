<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationChild extends Model
{
    protected $fillable = [
        'name',
        'specialization_id',
    ];
    
    public function admissions()
    {
        return $this->hasMany(Admission::class);

    }
    public function Specialization(){

        return $this->belongsTo(Specialization::class,'specialization_id');

    }
}
