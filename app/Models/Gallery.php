<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Str;

class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['caption', 'slug', 'status'];

    protected static function booted()
    {
        static::creating(function ($gallery) {
            if (empty($gallery->slug)) {
                $slug = Str::slug($gallery->caption);
                $count = $a = 0;
                do {
                    $count = Gallery::where('slug', $slug)->count();
                    if ($count > 0) {
                        $a++;
                        $slug = Str::slug($gallery->caption) . '-' . $a;
                    }
                } while ($count > 0);
                $gallery->slug = $slug;
            }
        });
    }

    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
                $slug = Str::slug($value);
                $count = $a = 0;
                do {
                    $count = Gallery::where('slug', $slug)->count();
                    if ($count > 1) {
                        $a++;
                        $slug = Str::slug($value) . '-' . $a;
                    }
                } while ($count > 1);
            $this->attributes['slug'] = $slug;
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400)
            ->sharpen(10)
            ->performOnCollections('gallery')
            ->nonQueued();
    }
}
