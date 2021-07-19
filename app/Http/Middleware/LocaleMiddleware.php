<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class LocaleMiddleware
{
    public static $mainLanguage = 'en'; //основной язык, который не должен отображаться в URl

    public static $languages = ['en', 'ru', 'uk']; // Указываем, какие языки будем использовать в приложении.


    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {
        if (request()->filled('lang') && in_array(request()->lang, self::$languages)) {
            if (request()->lang != self::$mainLanguage){
                if (request()->lang == 'ua'){
                    return 'uk';
                }
                return request()->lang;
            }
        }

//        $uri = Request::path(); //получаем URI
//
//        $segmentsURI = explode('/', $uri); //делим на части по разделителю "/"
//
//        if (!empty($segmentsURI[1]) && in_array($segmentsURI[1], self::$languages)) {
//
//            if ($segmentsURI[1] != self::$mainLanguage) return $segmentsURI[1];
//
//        }
        return null;
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        if ($locale){
            App::setLocale($locale);
        } else { //если метки нет - устанавливаем основной язык $mainLanguage
            App::setLocale(self::$mainLanguage);
        }

        return $next($request); //пропускаем дальше - передаем в следующий посредник
    }
}
