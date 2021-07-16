<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use App\Models\MemberModel;
use App\Models\ProjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class ProjectsPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "projects_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'projects_title',
        'projects_subtitle',
        'projects_block_text',
        'projects_list_text',
        'date_label',
        'area_label',
        'area_unit',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'projects_title',
        'projects_subtitle',
        'projects_block_text',
        'projects_list_text',
        'date_label',
        'area_label',
        'area_unit',
    ];

    public static function normalizeData($object){
        $projectsTitle = [];
        $projectsSubtitle = [];

        if (array_key_exists('projects_title', $object)){
            foreach ($object["projects_title"] as $titleLine){
                $projectsTitle[$titleLine['layout']] = $titleLine["attributes"]["text"];
            }
            $object["projects_title"] = $projectsTitle;
        }

        if (array_key_exists('projects_subtitle', $object)){
            foreach ($object["projects_subtitle"] as $titleLine){
                $projectsSubtitle[] = $titleLine["attributes"]["text"];
            }
            $object["projects_subtitle"] = $projectsSubtitle;
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
