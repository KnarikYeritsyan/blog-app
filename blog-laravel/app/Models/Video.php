<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'status','title','slug','link','content','video_group','type','url_type','name'
    ];

    public function getTitleAttribute()
    {
        return json_decode($this->attributes['title'])->{app()->getLocale()};
    }

    public function getContentAttribute()
    {
        return json_decode($this->attributes['content'])->{app()->getLocale()};
    }
}
