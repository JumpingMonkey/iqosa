<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PrivacyPolicyPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "privacy_policy_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title_bold',
        'title_thin',
        'subtitle',
        'content',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'title_bold',
        'title_thin',
        'subtitle',
        'content',
    ];
}
