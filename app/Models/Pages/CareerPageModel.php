<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class CareerPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "career_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title',
        'subtitle',
        'numeration_text',
        'vacancy_link_text',
        'vacancy_link_text_animated',
        'bottom_title_bold',
        'bottom_title_thin',
        'bottom_link',
        'bottom_link_text',
        'bottom_link_text_animated'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'title',
        'subtitle',
        'numeration_text',
        'vacancy_link_text',
        'vacancy_link_text_animated',
        'bottom_title_bold',
        'bottom_title_thin',
        'bottom_link_text',
        'bottom_link_text_animated'
    ];

    public static function normalizeData($object){
        $subtitle = [];


        if (array_key_exists('subtitle', $object)){
            foreach ($object["subtitle"] as $titleLine){
                $subtitle[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
            }
            $object["subtitle"] = $subtitle;
        }

        return $object;

    }

    public function getFullData(){
        try{

            return self::normalizeData($this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
