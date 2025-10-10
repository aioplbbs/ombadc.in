<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Menu extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['setting_id', 'title', 'url', 'parent_id', 'position'];

    protected $appends = ['url_external', 'url_internal', 'is_faculty'];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position', 'asc')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id'] = $value ?: null;
    }

    public function getUrlInternalAttribute()
    {
        if (!empty($this->url) && !filter_var($this->url, FILTER_VALIDATE_URL)) {
            $page = Page::where('slug', $this->url)->first();
            return $page ? $page->id : null;
        }
        return null;
    }

    public function getUrlExternalAttribute()
    {
        if(!empty($this->url) && filter_var($this->url, FILTER_VALIDATE_URL)){
            return $this->url;
        }
        return null;
    }

    public function getIsFacultyAttribute()
    {
        if (!empty($this->url) && !filter_var($this->url, FILTER_VALIDATE_URL)) {
            $page = Page::where('slug', $this->url)->where('page_type', 'Faculty')->first();
            if($page){
                return true;
            }
        }
        return false;
    }

    public function setUrlAttribute($value)
    {
        if(!empty($value['external'])){
            $this->attributes['url'] = $value['external'];
        }else{
            $this->attributes['url'] = $value['internal'] ?Page::find($value['internal'])->slug: null;
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('menu_file');
    }
}
