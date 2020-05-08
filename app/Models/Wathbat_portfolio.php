<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_portfolio extends Model
{
    protected $fillable = [
        'image', 'order', 'portfolio_type_id'
    ];
    public function type()
    {
        return $this->belongsTo('App\Models\Portfolio_type','portfolio_type_id');

    }
}
