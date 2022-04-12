<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Models extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations ,HasTranslatableSlug , EscapeUniCodeJson;
    protected $table = 'models';
    public $fillable = ['name','year','brand_id','status'];
    public $translatable = ['name' , 'slug' ,];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
