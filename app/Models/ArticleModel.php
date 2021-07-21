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



        if (array_key_exists('authors', $object)){
            foreach ($object["authors"] as $titleLine){
                $authors[] = $titleLine["attributes"]["author_name"];
            }
            $object["authors"] = $authors;
        }
//
//        if (array_key_exists('subjects', $object)){
//            foreach ($object["subjects"] as $titleLine){
//                $subjects[] = $titleLine["attributes"]["subject_name"];
//            }
//            $object["subjects"] = $subjects;
//        }
//
        if (array_key_exists('content', $object)){
            foreach ($object["content"] as $contentItem) {
                if ($contentItem['layout'] == 'text_block') {
                    $content[] = [$contentItem['layout'] => $contentItem["attributes"]["text"]];
                }
                $cont = [];
                if ($contentItem['layout'] == 'gallery') {

                    foreach ($contentItem["attributes"]["gallery_items"] as $galleryItem){
                        $element = [];
                        $texts = [];
                        $element["picture"] = $galleryItem["attributes"]["picture"];

                        foreach ($galleryItem["attributes"]["picture_text"] as $text){
                            $texts[] = $text["attributes"]["text"];
                        }

                        $element["picture_text"] = $texts;

                        $cont[] = $element;

                    }

                    $content[] = [$contentItem['layout'] => $cont];

                }
            }
            $object["content"] = $content;
        }

        return $object;

    }

    public static function getFullData(self $object){
        try{
            return $object->getAllWithMediaUrlWithout(['updated_at']);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

    public static function getFullDataOneAtricle(self $object){
        try{
            return self::normalizeData($object->getAllWithMediaUrlWithout(['id', 'updated_at']));

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
