<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wathbat_social extends Model
{
    protected $fillable = [
        'facebook_url', 'twitter_url', 'linkedin_url','instgram_url','googleplus_url','youtube_url'
    ];
}
