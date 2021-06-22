<?php

namespace App\Models\Parts;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Header extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $fillable = [
        'logo',
        'navigation',
    ];

    public $translatable = [
        'navigation',
        'name',
        'btn_text',
    ];

    public $mediaToUrl = [
        'logo',
    ];
}
