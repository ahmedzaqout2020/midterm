<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    

    protected $fillable = [
        'user_name', 'user_phone', 'user_email',
    ];
}