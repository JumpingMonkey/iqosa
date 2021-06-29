<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutPlugPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "about_plug_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'about_plug_title',
        'about_plug_text',
        'about_plug_picture',
        'about_plug_links',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'about_plug_title',
        'about_plug_text',
    ];

    public $mediaToUrl = [
        'about_plug_picture',
    ];

    public $fromStrToJson = [
        'about_plug_links',
    ];

}
