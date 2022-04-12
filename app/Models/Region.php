<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory , HasTranslations ,HasTranslatableSlug , EscapeUniCodeJson;
    public $fillable = ['name','latitude','longitude','status','raduis','city_id'];
    public $translatable = ['name','slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

}
