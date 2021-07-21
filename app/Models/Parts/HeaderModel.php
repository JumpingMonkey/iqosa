<?php

namespace App\Models\Parts;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "headers";

    protected $fillable = [
        'logo',
        'navigation',
        'social_links',
    ];

    public $translatable = [
        'navigation',
        'name',
        'btn_text',
    ];

    public $mediaToUrl = [
        'logo',
    ];

    public $fromStrToJson = [
        'social_links',
    ];

    public static function getHeader(){

        $header = self::firstOrFail()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        $socialLinks = [];
        $headerNav = [];

        if($header["social_links"]) {
            foreach ($header["social_links"] as $link) {
                $socialLinks[] = [
                    "social_link" => $link["attributes"]["social_link"],
                    "social_name" => $link["attributes"]["social_name"],
                ];
            }
        }

        $header["social_links"] = $socialLinks;

        if($header["navigation"]) {
            foreach ($header["navigation"] as $navItem) {
                $headerNav[] = [
                    "link" => $navItem["attributes"]["link"],
                    "name" => $navItem["attributes"]["name"]
                ];
            }
        }
        $header["navigation"] = $headerNav;

        return $header;
    }
}
