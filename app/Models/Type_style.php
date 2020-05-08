<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_style extends Model
{
    protected $fillable = [
        'en_style', 'ar_style', 'type_id'
    ];
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');

    }
}
