<?php

namespace App\Models\Parts;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FooterModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "footers";

    protected $fillable = [
        'left_title',
        'left_city',
        'left_address',
        'left_google_map_link',
        'left_emails',
        'left_tels',
        'center_title',
        'center_emails',
        'right_title',
        'right_big_text',
        'right_big_link_text',
        'right_big_link',
        'right_links',
        'politic_label',
        'politic_link',
        'social_links',
        'developed_label',
        'developed_by_label',
        'developed_by_link',
        'cookie_text',
        'cookie_btn_text',
    ];

    public $translatable = [
        'left_title',
        'left_city',
        'left_address',
        'left_tels',
        'center_title',
        'center_emails',
        'right_title',
        'right_big_text',
        'right_big_link_text',
        'right_links',
        'politic_label',
        'developed_label',
        'cookie_text',
        'cookie_btn_text',
    ];

    public $mediaToUrl = [
        'right_links',
        'link_content',
        'file',
    ];

    public $fromStrToJson = [
//        'left_emails',
        'social_links',
    ];

    public static function getFooter()
    {
        $footer = self::firstOrFail()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        $rightLinks = [];
        $leftTels = [];
        $centerEmails = [];
        $socialLinks = [];

    if($footer["right_links"]){


        foreach ($footer["right_links"] as $links){

                $rr = [];
                foreach ($links['attributes']['link_content'] as $cont){
                    $linkContent = [];
                    if(isset($cont['attributes']['link'])){
                        $linkContent[] = $cont['attributes']['link'];
                    }
                    if(isset($cont['attributes']['file'])){
                        $linkContent[] = $cont['attributes']['file'];
                    }

                }
               $rr['link_text']  = $links['attributes']['link_text'];
               $rr['link_content'] = $linkContent;

                $rightLinks[] = $rr;


//            $linkContent['link_text'] = $links['attributes']['link_text'];
//            $linkContent['link_content'] = $links['attributes']['link_content'];
//
//
//            $rightLinks[$links['layout']] = $links["attributes"];
        }
}
        $footer["right_links"] = $rightLinks;

    if($footer["left_tels"]){
        foreach ($footer["left_tels"] as $tel){
            $leftTels[] = [
                'tel' => $tel["attributes"]["tel"],
                'person' => $tel["attributes"]["person"],
            ];
        }
    }
        $footer["left_tels"] = $leftTels;

        if($footer["center_emails"]){
        foreach ($footer["center_emails"] as $email){
            $centerEmails[] = [
                'title' => $email["attributes"]["title"],
                'email' => $email["attributes"]["e-mail"],
            ];
        }
        }
        $footer["center_emails"] = $centerEmails;

            if($footer["social_links"]) {
                foreach ($footer["social_links"] as $link) {
                    $socialLinks[] = [
                        "social_link" => $link["attributes"]["social_link"],
                        "social_name" => $link["attributes"]["social_name"],
                    ];
                }
            }

        $footer["social_links"] = $socialLinks;
        $footer['year'] = date('Y');

        return $footer;
    }
}
