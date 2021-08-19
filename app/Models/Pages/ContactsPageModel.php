<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class ContactsPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "contacts_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'address',
        'address_two',
        'latitude',
        'longitude',
        'map_link',
        'map_link_text',
        'map_link_text_animated'
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'address',
        'address_two',
        'map_link_text',
        'map_link_text_animated'
    ];


    public function getFullData(){
        try{

            return $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
