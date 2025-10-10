<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Str;

class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['caption', 'slug', 'status'];

    protected static function booted()
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $slug = Str::slug($page->name);
                $count = $a = 0;
                do {
                    $count = Gallery::where('slug', $slug)->count();
                    if ($count > 0) {
                        $a++;
                        $slug = Str::slug($page->name) . '-' . $a;
                    }
                } while ($count > 0);
                $page->slug = $slug;
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
}
