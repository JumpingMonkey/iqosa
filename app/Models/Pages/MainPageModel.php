<?php

namespace App\Models\Pages;

use App\Traits\HasMediaToUrl;
use App\Models\MemberModel;
use App\Models\ProjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class MainPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "main_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_link_text',
        'hero_link_text_animated',
        'hero_link',
        'projects',
        'projects_title',
        'projects_title_animated',
        'projects_title_link',
        'projects_current_text_animated',
        'projects_current_text',
        'team_members',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
        'team_link',
        'main_video',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_link_text',
        'hero_link_text_animated',
        'projects_title',
        'projects_title_animated',
        'projects_current_text_animated',
        'projects_current_text',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
        'main_video'
    ];

//    public $mediaToUrl = [
//        'main_video'
//    ];

//    public function getTeamMembersAttribute($value)
//    {
//        return json_decode($value);
//    }

    public function getProjectsDataAttribute()
    {
        return json_decode($this["projects"]);
    }

    public function getMembersDataAttribute()
    {
        return json_decode($this["team_members"]);
    }

    public function getProjects()
    {
        $projectIds = [];
        $projectsData = [];
        $projectsObject = $this["projects_data"];
        if(isset($projectsObject)){
            foreach ($projectsObject as $project) {
                $projectIds[] = $project->attributes->project;
            }
            $projects = ProjectModel::select('seo_title')
                ->whereIn('id', $projectIds)
                ->select("id", "type", "number", "link", "release_date", "area", "main_picture", "city", "country")
                ->get();

            foreach ($projectsObject as $key => $project) {

                $projectsData[] = $projects->first(function ($value) use ($project) {
                    return $value->id === (int)$project->attributes->project;
                })
                    ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
                }
        }
        $this->projects = $projectsData;
    }


    public function getMembers()
    {
        $memberIds = [];
        $membersData = [];
        $membersDataMobOrder = [];
        $membersObject = $this["members_data"];

        foreach ($membersObject as $member) {
            $memberIds[] = $member->attributes->member;
        }

        $members = MemberModel::whereIn('id', $memberIds)->get();
        $membersMobOrder = MemberModel::whereIn('id', $memberIds)->orderBy('sort_order')->get();


        foreach ($membersObject as $key => $member) {
            $membersData[] = $members->first(function ($value) use ($member) {
                return $value->id === (int)$member->attributes->member;
            })
                ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at', 'sort_order']);
        }

        foreach ($membersMobOrder as $key => $member) {
            $membersDataMobOrder[] = $member->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at', 'sort_order']);

        }

        $this->team_members = $membersData;
        $this->team_members_mob = $membersDataMobOrder;
    }

    public static function normalizeData($object){
        $heroTitle = [];
        $heroText = [];
        $teamText = [];

        if (array_key_exists('hero_title', $object)){
            foreach ($object["hero_title"] as $titleLine){
                $heroTitle[] = $titleLine["attributes"]["text"];
            }
            $object["hero_title"] = $heroTitle;
        }

        if (array_key_exists('hero_text', $object)){
            foreach ($object["hero_text"] as $textLine){
                $heroText[] = $textLine["attributes"]["text"];
            }
            $object["hero_text"] = $heroText;
        }

        if (array_key_exists('team_text', $object)){
            foreach ($object["team_text"] as $teamTextLine){
                $teamText[$teamTextLine["layout"]] = $teamTextLine["attributes"]["text"];
            }
            $object["team_text"] = $teamText;
        }



        return $object;

    }

    public function getFullData(){
        try{
            $this->getProjects();
            $this->getMembers();
            $data = $this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

            if (array_key_exists('main_video', $data)){
                $data['main_video'] = $this->getOneMedia($data['main_video']);
            };
            return self::normalizeData($data);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
