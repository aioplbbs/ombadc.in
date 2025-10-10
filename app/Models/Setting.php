<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'data'];

    protected $casts = [
        "data" => 'array'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'setting_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo');
        $this->addMediaCollection('site_favicon');
        $this->addMediaCollection('banner');

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->nonQueued()
            ->performOnCollections('banner');
    }
}
