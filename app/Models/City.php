<?php

namespace App\Models;

use App\Models\Region;
use App\Traits\EscapeUniCodeJson;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory , HasTranslations  , EscapeUniCodeJson;
    public $fillable = ['name','status'];
    public $translatable = ['name'];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

}
