<?php

namespace App\Models;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public static function normalizeData($object){
        $vacancyDescription = [];

        if (array_key_exists('vacancy_description', $object)){
            foreach ($object["vacancy_description"] as $titleLine){
                $vacancyDescription[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
            }
            $object["vacancy_description"] = $vacancyDescription;
        }

        return $object;

    }

    public static function getFullData(self $object){
        try{
            return self::normalizeData($object->getAllWithMediaUrlWithout(['id','created_at', 'updated_at']));

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
