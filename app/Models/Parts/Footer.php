<?php

namespace App\Models\Parts;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Footer extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'left_title',
        'left_city',
        'left_address',
        'left_google_map_link',
        'left_emails',
        'left_tels',
        'center_title',
        'center_emails',
        'right_title',
        'right_big_text',
        'right_big_link_text',
        'right_big_link',
        'right_links',
        'politic_label',
        'politic_link',
        'social_links',
        'developed_label',
        'developed_by_label',
        'developed_by_link',
        'cookie_text',
        'cookie_btn_text',
    ];

    public $translatable = [
        'left_title',
        'left_city',
        'left_address',
        'left_tels',
        'center_title',
        'center_emails',
        'right_title',
        'right_big_text',
        'right_big_link_text',
        'right_links',
        'politic_label',
        'developed_label',
        'cookie_text',
        'cookie_btn_text',
    ];

    public $mediaToUrl = [
        'right_links',
        'link_content',
        'file',
    ];

    public $fromStrToJson = [
        'left_emails',
        'social_links',
    ];
}
