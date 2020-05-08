<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_client extends Model
{
    protected $fillable = [
        'logo', 'en_name', 'ar_name','url','active'
    ];
}
