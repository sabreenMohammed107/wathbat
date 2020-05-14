<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_gallery extends Model
{
    protected $fillable = [
        'image', 'order', 'project_id'
    ];
    public function type()
    {
        return $this->belongsTo('App\Models\Wathbat_project','project_id');

    }
}
