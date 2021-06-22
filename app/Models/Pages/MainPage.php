<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainPage extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_link_text',
        'hero_link_text_animated',
        'hero_link',
        'projects',
        'projects_title',
        'projects_title_animated',
        'projects_title_link',
        'projects_current_text_animated',
        'projects_current_text',
        'team_members',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
        'team_link',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_link_text',
        'hero_link_text_animated',
        'projects_title',
        'projects_title_animated',
        'projects_current_text_animated',
        'projects_current_text',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
    ];

    public $fromStrToJson = [
        'projects',
        'team_members',
    ];
}
