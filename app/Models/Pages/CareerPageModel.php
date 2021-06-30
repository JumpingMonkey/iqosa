<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CareerPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "career_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title',
        'subtitle',
        'numeration_text',
        'vacancy_link_text',
        'vacancy_link_text_animated',
        'bottom_title_bold',
        'bottom_title_thin',
        'bottom_link',
        'bottom_link_text',
        'bottom_link_text_animated'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'title',
        'subtitle',
        'numeration_text',
        'vacancy_link_text',
        'vacancy_link_text_animated',
        'bottom_title_bold',
        'bottom_title_thin',
        'bottom_link_text',
        'bottom_link_text_animated'
    ];
}
