<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mews\Purifier\Casts\CleanHtmlInput;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Document extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['name', 'data', 'category'];

    protected $casts=[
        'name'=> CleanHtmlInput::class,
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection("documents");
        $this->addMediaCollection("thumbnails");
    }
}
