<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Error404PageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "error404_pages";

    protected $fillable = [
        'title_big_bold',
        'title_big_thin',
        'link_text',
        'link_text_animated',
    ];

    public $translatable = [
        'title_big_bold',
        'title_big_thin',
        'link_text',
        'link_text_animated',
    ];
}
