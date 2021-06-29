<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MediaPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "media_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'media_title',
        'media_link_text',
        'media_link',
        'media_text',
        'media_images'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'media_title',
        'media_link_text',
        'media_text',
    ];

    public $mediaToUrl = [
        'media_images',
        'picture'
    ];

    public $fromStrToJson = [
        'media_images',
    ];
}
