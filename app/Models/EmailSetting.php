<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    protected $table = "email_setting";

    protected $fillable=[
        "price_egypt",
        "price_non_egypt",
        "phone",
        "email",
        "vodafone_cash",
        "registration_date",
        "mrd_egypt",
        "mrd_dollar",
        "morth_egypt",
        "morth_dollar",
        "next_date",
    ];
}
