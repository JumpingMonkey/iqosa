<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class WorkWithYouPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "work_with_you_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title_small',
        'title_big_bold',
        'title_big_thin',
        'prev_page_label',
        'prev_page_link',
        'next_page_label',
        'next_page_link',
        'form_title',
        'firstname_input_placeholder',
        'lastname_input_placeholder',
        'portfolio_input_placeholder',
        'email_input_placeholder',
        'message_input_placeholder',
        'submit_text',
        'submit_text_animated',
        'thanks_title_bold',
        'thanks_title_thin',
        'thanks_link_text',
        'thanks_link_text_animated',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'title_small',
        'title_big_bold',
        'title_big_thin',
        'prev_page_label',
        'next_page_label',
        'form_title',
        'firstname_input_placeholder',
        'lastname_input_placeholder',
        'portfolio_input_placeholder',
        'email_input_placeholder',
        'message_input_placeholder',
        'submit_text',
        'submit_text_animated',
        'thanks_title_bold',
        'thanks_title_thin',
        'thanks_link_text',
        'thanks_link_text_animated',
    ];

    public static function normalizeData($object){
        $titleSmall = [];
        $formTitle = [];

        if (array_key_exists('title_small', $object)){
            foreach ($object["title_small"] as $titleLine){
                $titleSmall[] = $titleLine["attributes"]["text"];
            }
            $object["title_small"] = $titleSmall;
        }

        if (array_key_exists('form_title', $object)){
            foreach ($object["form_title"] as $titleLine){
                $formTitle[] = $titleLine["attributes"]["text"];
            }
            $object["form_title"] = $formTitle;
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
