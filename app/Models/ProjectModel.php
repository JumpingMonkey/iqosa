<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "projects";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'type',
        'number',
        'link',
        'release_date',
        'area',
        'main_picture',
        'city',
        'country',
        'team_members',
        'content',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'city',
        'country',
        'content',
        'members',
    ];

    public $mediaToUrl = [
        'main_picture',
        'content',
        'image',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image',
        'members',
    ];

    public $fromStrToJson = [
        'team_members',
    ];


//    public function members()
//    {
//        return $this->belongsToMany(MemberModel::class);
//    }

}
