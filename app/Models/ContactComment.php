<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactComment extends Model
{
    protected $fillable = ['name','email','subject','phone','messege'];

    // public function Contact()
    // {
    //     return $this->belongsTo('App\Models\Contact','contact_id');

    // }
}
