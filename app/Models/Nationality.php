<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Nationality extends Model
{
    protected $fillable = [
        'id',
        'country_enName',
        'country_arName',
        
    ];
    
    protected $primarykey='id';
    public $incrementing =false;
    
    public function admissions()
    {
        return $this->hasMany(Admission::class);
        
    }
}
