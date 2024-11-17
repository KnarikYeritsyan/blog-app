<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasTranslations;
    protected $fillable = [
        'status','title','slug','link','content','video_group','type','url_type','name'
    ];
    public $translatable = ['title','content'];
}
