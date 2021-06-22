<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectsPage extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'seo_title',
        'meta_description',
        'projects_title',
        'projects_subtitle',
        'projects_block_text',
        'projects_list_text',
        'date_label',
        'area_label',
        'area_unit',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'projects_title',
        'projects_subtitle',
        'projects_block_text',
        'projects_list_text',
        'date_label',
        'area_label',
        'area_unit',
    ];

}
