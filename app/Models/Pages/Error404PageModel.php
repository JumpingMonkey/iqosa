<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class Error404PageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "error404_pages";

    protected $fillable = [
        'title_big_bold',
        'title_big_thin',
        'link_text',
        'link_text_animated',
    ];

    public $translatable = [
        'title_big_bold',
        'title_big_thin',
        'link_text',
        'link_text_animated',
    ];

    public function getFullData(){
        try{
            return $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
