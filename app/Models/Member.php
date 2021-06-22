<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Member extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'name',
        'surname',
        'position',
        'about',
        'photo',
        'parallax_photo',
    ];

    public $translatable = [
        'name',
        'surname',
        'position',
        'about',
    ];

    public $mediaToUrl = [
        'photo',
        'parallax_photo',
    ];


    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }


}
