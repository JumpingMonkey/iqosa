<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUsPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "about_us_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'main_picture',
        'preview_video',
        'main_video',
        'hero_left_text',
        'hero_right_text',
        'first_animated_text',
        'team_members',
        'team_title',
        'team_link_text_animated',
        'team_link_text',
        'team_link',
        'second_animated_text',
        'slider_text',
        'slider_pictures',
        'bottom_block_picture',
        'bottom_block_text',
        'bottom_block_hover_text',
        'bottom_block_link',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'main_video',
        'hero_left_text',
        'hero_right_text',
        'first_animated_text',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
        'second_animated_text',
        'slider_text',
        'bottom_block_text',
        'bottom_block_hover_text',
    ];

    public $mediaToUrl = [
        'main_picture',
        'preview_video',
        'main_video',
        'slider_pictures',
        'picture',
        'bottom_block_picture',

    ];

    public $fromStrToJson = [
        'team_members',
    ];
}
