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
        'content2'
    ];

    public $translatable = [
        'content',
        'content2'
    ];
// код который был раньше. Обрабатывет вывод контента прелоадера из одного флекс поля
//    public static function getPreloader()
//    {
//        $preloader = self::firstOrFail()->content;
//
//        $preloaderNormalized = [];
//
//        foreach ($preloader as $preloaderLine){
//            $preloaderNormalized[] = $preloaderLine["attributes"]["text"];
//        }
//
//        return $preloaderNormalized;
//    }

    public static function getPreloader()
    {
        $preloader[] = self::firstOrFail()->content;
        $preloader[] = self::firstOrFail()->content2;

//        $preloaderNormalized = [];
//
//        foreach ($preloader as $preloaderLine){
//            $preloaderNormalized[] = $preloaderLine["attributes"]["text"];
//        }

        return $preloader;
    }

}
