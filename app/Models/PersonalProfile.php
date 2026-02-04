<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Mews\Purifier\Casts\CleanHtmlInput;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PersonalProfile extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'designation', 'staff_category', 'email', 'phone_number', 'date_of_birth', 'qualification', 'short_brief'];

    protected $casts=[
        'name'=>CleanHtmlInput::class,
        'slug'=>CleanHtmlInput::class,
        'designation'=>CleanHtmlInput::class,
        'qualification'=>CleanHtmlInput::class,
        'short_brief'=>CleanHtmlInput::class,
    ];

    protected static function booted()
    {
        static::creating(function ($profile) {
            if (empty($profile->slug)) {
                $slug = Str::slug($profile->name);
                $count = $a = 0;
                do {
                    $count = PersonalProfile::where('slug', $slug)->count();
                    if ($count > 0) {
                        $a++;
                        $slug = Str::slug($profile->name) . '-' . $a;
                    }
                } while ($count > 0);
                $profile->slug = $slug;
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection("personal_profile");
    }
}
