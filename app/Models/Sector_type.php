<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector_type extends Model
{
    protected $fillable = [
        'en_sector', 'ar_sector', 'type_style_id','aluminium_thickness','glass','price_per_meter','image'
    ];
    public function style()
    {
        return $this->belongsTo('App\Models\Type_style','type_style_id');

    }
}
