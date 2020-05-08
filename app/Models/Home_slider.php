<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home_slider extends Model
{
    protected $fillable = [
        'image', 'master_ar_text', 'master_en_text','url','order','active'
    ];
}
