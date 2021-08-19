<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class JoinPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "join_pages";

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
        'text_before_name',
        'name_input_placeholder',
        'text_before_vacancy',
        'vacancy_input_placeholder',
        'text_before_file',
        'file_input_placeholder',
        'text_before_portfolio',
        'portfolio_input_placeholder',
        'text_before_email',
        'email_input_placeholder',
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
        'text_before_name',
        'name_input_placeholder',
        'text_before_vacancy',
        'vacancy_input_placeholder',
        'text_before_file',
        'file_input_placeholder',
        'text_before_portfolio',
        'portfolio_input_placeholder',
        'text_before_email',
        'email_input_placeholder',
        'submit_text',
        'submit_text_animated',
        'thanks_title_bold',
        'thanks_title_thin',
        'thanks_link_text',
        'thanks_link_text_animated',
    ];

    public static function normalizeData($object){
        $titleSmall = [];

        if (array_key_exists('title_small', $object)){
            foreach ($object["title_small"] as $titleLine){
                $titleSmall[] = $titleLine["attributes"]["text"];
            }
            $object["title_small"] = $titleSmall;
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
