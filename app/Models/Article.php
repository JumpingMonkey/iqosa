<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'title',
        'seo_title',
        'meta_description',
        'link',
        'main_picture',
        'authors',
        'subjects',
        'content',
    ];

    public $translatable = [
        'title',
        'seo_title',
        'meta_description',
        'authors',
        'subjects',
        'content',
    ];

    public $mediaToUrl = [
        'main_picture',
        'content',
        'picture',
    ];

}
