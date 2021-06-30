<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VacancyModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "vacancies";

    protected $fillable = [
        'vacancy_name',
        'vacancy_top_text',
        'vacancy_responsibilities',
        'vacancy_bottom_text',
        'vacancy_description',
    ];

    public $translatable = [
        'vacancy_top_text',
        'vacancy_responsibilities',
        'vacancy_bottom_text',
        'vacancy_description',
    ];
}
