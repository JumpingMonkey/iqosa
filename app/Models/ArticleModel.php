<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class ArticleModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "articles";

    protected $fillable = [
        'title',
        'seo_title',
        'meta_description',
        'link',
        'main_picture',
        'authors',
        'subjects',
        'content',
    ];

    public $translatable = [
        'title',
        'seo_title',
        'meta_description',
        'authors',
        'subjects',
        'content',
    ];

    public $mediaToUrl = [
        'main_picture',
        'content',
        'picture',
    ];

    public static function normalizeData($object){
        $authors = [];
        $subjects = [];
        $content = [];
        $tmp = [];


        if (array_key_exists('authors', $object)){
            foreach ($object["authors"] as $titleLine){
                $authors[] = [$titleLine['layout'] => $titleLine["attributes"]["author_name"]];
            }
            $object["authors"] = $authors;
        }

        if (array_key_exists('subjects', $object)){
            foreach ($object["subjects"] as $titleLine){
                $subjects[] = [$titleLine['layout'] => $titleLine["attributes"]["subject_name"]];
            }
            $object["subjects"] = $subjects;
        }

        if (array_key_exists('content', $object)){
            foreach ($object["content"] as $titleLine) {
                if ($titleLine['layout'] == 'text_block') {
                    $content[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
                }
///////////Переписать!!!//////////
                if ($titleLine['layout'] == 'gallery') {
                    $tmp = [$titleLine['layout'] => $titleLine["attributes"]["gallery_items"]];

                    $content_galery = [];
                    foreach ($tmp['gallery'] as $item){
//                        foreach ($item['attributes'] as $item2){
//                            dd($item2);
//                        }
                        $content_galery[] = $item["attributes"];

                    }
                    $content[] = $content_galery;
                }
            }
            $object["content"] = $content;
        }
////////////

        return $object;

    }

//    public static function f($object){
//
//        if(array_key_exists('attributes', $object)){
//            $object = [$object['layout'] => $object["attributes"]['gallery_items']];
//            return self::f($object);
//        } else {
//            $object
//        }
//    }

    public static function getFullData(self $object){
        try{
            return $object->getAllWithMediaUrlWithout(['id', 'updated_at']);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

    public static function getFullDataOneAtricle(self $object){
        try{
            return self::normalizeData($object->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
