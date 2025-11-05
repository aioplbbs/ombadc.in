<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Casts\CleanHtmlInput;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Str;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['name', 'slug', 'page_type', 'page_content', 'seo', 'status'];

    protected $casts = [
        'name' => CleanHtmlInput::class,
        'seo' => 'array'
    ];

    protected static function booted()
    {
        static::creating(function ($page) {
            if (empty($page->slug)) {
                $slug = Str::slug($page->name);
                $count = $a = 0;
                do {
                    $count = Page::where('slug', $slug)->count();
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
                    $count = Page::where('slug', $slug)->count();
                    if ($count > 1) {
                        $a++;
                        $slug = Str::slug($value) . '-' . $a;
                    }
                } while ($count > 1);
            $this->attributes['slug'] = $slug;
        }
    }

    public function setSeoAttribute($value)
    {
        $this->attributes['seo'] = json_encode([
            'title'       => $value['title'] ?? '',
            'keywords'    => $value['keywords'] ?? '',
            'description' => $value['description'] ?? '',
        ]);
    }

    public function getSubContentAttribute()
    {
        $page_type = $this->attributes['page_type'];
        $page_id = $this->attributes['id'];
        return Page::where('page_type', $page_type)->where('id', '!=', $page_id)->orderBy('id', 'desc')->get();
    }

    public function customData()
    {
        return $this->morphOne(CustomData::class, 'customizable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page_banner');
        $this->addMediaCollection('page_photo');
        $this->addMediaCollection('page_pdf');
    }

    public function departments(){
        return $this->hasMany(Department::class, 'page_id');
    }

    public function getGalleryInfoAttribute()
    {
        $custom = $this->customData()->where('name', 'gallery_data')->first();

        if (! $custom) {
            return 'null';
        }

        $data = $custom->data;

        return [
            'gallery' => Gallery::find($data['gallery_id'] ?? null),
            'banner'  => Banner::find($data['banner_id'] ?? null),
        ];
    }

}
