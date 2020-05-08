<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_project extends Model
{
    public function alumital()
    {
        return $this->belongsTo('App\Models\Project_alumital_type','alumital_type_id');

    }
    public function type()
    {
        return $this->belongsTo('App\Models\Project_type','project_type_id');

    }
}
