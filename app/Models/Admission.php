<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'birth_date',
        'gender',
        'img',
        'national_id',
        'graduation',
        'university',
        'c_v',
        'work',
        'employment',
        'experience',
        'nationality_id',
        'specialization_id',
        'step_1',
        'step_2',
        'step_3',
        'stutas',
        'exam',
        'user_id',
        'Country_id',
        'specialization_children_id',
    ];

    public function specializations(){

        return $this->belongsTo(Specialization::class,'specialization_id');

    }
    public function users(){

        return $this->belongsTo('App\User','user_id')->orderBy('interview_one','desc');

    }

    public function nationalities(){

        return $this->belongsTo(Nationality::class,'nationality_id');

    }

    public function countries(){

        return $this->belongsTo(Country::class,'Country_id');

    }
    
    public function SpecializationChild(){

        return $this->belongsTo(SpecializationChild::class,'specialization_children_id');

    }
    
}

