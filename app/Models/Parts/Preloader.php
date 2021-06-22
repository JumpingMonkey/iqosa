<?php

namespace App\Models\Parts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Preloader extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'content',
    ];

    public $translatable = [
        'content',
    ];

}
