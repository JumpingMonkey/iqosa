<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactsPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "contacts_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'address',
        'latitude',
        'longitude',
        'map_link',
        'map_link_text',
        'map_link_text-animated'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'address',
        'map_link_text',
        'map_link_text-animated'
    ];
}
