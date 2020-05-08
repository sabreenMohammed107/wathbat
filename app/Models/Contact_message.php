<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_message extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile','messege'
    ];
}
