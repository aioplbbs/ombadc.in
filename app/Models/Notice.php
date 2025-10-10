<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Notice extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['notice_category', 'notice_type', 'notice_name', 'custom_data', 'notice_open_in', 'notice_blink', 'notice_publish', 'status'];

    protected $appends = ['url'];

    protected $casts = [
        'notice_category' => 'array',
        'custom_data' => 'array'
    ];

    public function getUrlAttribute()
    {
        if($this->notice_type == "Link"){
            return $this->custom_data['web_link'] ?? "#";
        }else{
            return !empty($this->getFirstMediaUrl('notice'))?$this->getFirstMediaUrl('notice'):"#";
        }

        return null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('notice');
    }
}
