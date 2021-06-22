<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectPage extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'date_label',
        'team_label',
        'area_label',
        'area_unit',
        'share_title',
        'share_facebook',
        'share_twitter',
        'share_linkedin',
        'link_block_title',
        'link_block_text',
        'link_block_link',
        'next_project_text'
    ];


    public $translatable = [
        'date_label',
        'team_label',
        'area_label',
        'area_unit',
        'share_title',
        'link_block_title',
        'link_block_text',
        'next_project_text'
    ];
}
