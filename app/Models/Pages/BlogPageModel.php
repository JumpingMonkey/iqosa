<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class BlogPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "blog_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'blog_title',
        'blog_link_text',
        'blog_link',
        'blog_text',
        'blog_btn_text'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'blog_title',
        'blog_link_text',
        'blog_text',
        'blog_btn_text'
    ];

    public static function normalizeData($object){
        $blogText = [];

        if (array_key_exists('blog_text', $object)){
            foreach ($object["blog_text"] as $titleLine){
                $blogText[] = [$titleLine['layout'] => $titleLine["attributes"]["text"]];
            }
            $object["blog_text"] = $blogText;
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
