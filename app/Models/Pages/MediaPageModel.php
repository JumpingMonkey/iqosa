<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class MediaPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "media_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'media_title',
        'media_link_text',
        'media_link',
        'media_text',
        'media_images'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'media_title',
        'media_link_text',
        'media_text',
    ];

    public $mediaToUrl = [
        'media_images',
        'picture'
    ];

    public $fromStrToJson = [
        'media_images',
    ];

    public static function normalizeData($object){
        $mediaText = [];
        $mediaImages = [];


        if (array_key_exists('media_text', $object)){
            foreach ($object["media_text"] as $titleLine){
                $mediaText[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
            }
            $object["media_text"] = $mediaText;
        }

        if (array_key_exists('media_images', $object)){
            foreach ($object["media_images"] as $titleLine){
                $mediaImages[] = [$titleLine['layout'] => $titleLine["attributes"]["picture"]];
            }
            $object["media_images"] = $mediaImages;
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
