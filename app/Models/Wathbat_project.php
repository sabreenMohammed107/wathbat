<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_project extends Model
{
    protected $fillable = [
        'project_ar_name', 'project_en_name', 'project_date','master_poster', 'project_ar_details',
        'project_en_details', 'about_ar_project', 'about_en_project','about_ar_customer', 'about_en_customer','project_type_id',
        'alumital_type_id'
    ];
    public function alumital()
    {
        return $this->belongsTo('App\Models\Project_alumital_type','alumital_type_id');

    }
    public function type()
    {
        return $this->belongsTo('App\Models\Project_type','project_type_id');

    }
}
