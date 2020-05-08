<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_data extends Model
{
    protected $fillable = [
        'phone', 'fax', 'address','email', 'map_url'
    ];
}
