<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class TermOfUse extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "term_of_uses";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title_bold',
        'title_thin',
        'subtitle',
        'content',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'title_bold',
        'title_thin',
        'subtitle',
        'content',
    ];

    public static function normalizeData($object){
        $subTitle = [];
        $content = [];

        if (array_key_exists('subtitle', $object)){
            foreach ($object["subtitle"] as $titleLine){
                $subTitle[] = $titleLine["attributes"]["text"];
            }
            $object["subtitle"] = $subTitle;
        }

        if (array_key_exists('content', $object)){
            foreach ($object["content"] as $titleLine){
                $content[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
            }
            $object["content"] = $content;
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
