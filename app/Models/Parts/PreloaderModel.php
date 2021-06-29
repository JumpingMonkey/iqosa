<?php

namespace App\Models\Parts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PreloaderModel extends Model
{
    use HasFactory, HasTranslations;

    protected $table = "preloaders";

    protected $fillable = [
        'content',
    ];

    public $translatable = [
        'content',
    ];

}
