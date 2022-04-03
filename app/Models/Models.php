<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Models extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected $table = 'models';
    public $fillable = ['name','year','brand_id','status'];
}
