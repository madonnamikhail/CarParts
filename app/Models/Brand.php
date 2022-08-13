<?php

namespace App\Models;

use App\Models\Models;
use App\Traits\EscapeUniCodeJson;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations ,HasTranslatableSlug , EscapeUniCodeJson;
    public $fillable = ['name','status'];
    public $translatable = ['name' , 'slug','brand_name','model_name'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    public function models()
    {
        return $this->hasMany(Models::class);
    }
}
