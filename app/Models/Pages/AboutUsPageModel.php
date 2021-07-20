<?php

namespace App\Models\Pages;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use App\Models\MemberModel;
use App\Models\ProjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class AboutUsPageModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "about_us_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'main_picture',
        'preview_video',
        'main_video',
        'hero_left_text',
        'hero_right_text',
        'first_animated_text',
        'second_animated_text',
        'team_members',
        'team_title',
        'team_link_text_animated',
        'team_link_text',
        'team_link',
        'third_animated_text',
        'fourth_animated_text',
        'slider_text',
        'slider_pictures',
        'bottom_block_picture',
        'bottom_block_text',
        'bottom_block_hover_text',
        'bottom_block_link',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'main_video',
        'hero_left_text',
        'hero_right_text',
        'first_animated_text',
        'second_animated_text',
        'team_text',
        'team_link_text_animated',
        'team_link_text',
        'third_animated_text',
        'fourth_animated_text',
        'slider_text',
        'bottom_block_text',
        'bottom_block_hover_text',

    ];

    public $mediaToUrl = [
        'main_picture',
        'preview_video',
//        'main_video',
        'slider_pictures',
        'picture',
        'bottom_block_picture',

    ];

//    public $fromStrToJson = [
//        'team_members',
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
        $this->projects = $projectsData;
    }


    public function getMembers()
    {
        $memberIds = [];
        $membersData = [];
        $membersObject = $this["members_data"];

        foreach ($membersObject as $member) {
            $memberIds[] = $member->attributes->member;
        }

        $members = MemberModel::whereIn('id', $memberIds)->get();

        foreach ($membersObject as $key => $member) {
            $membersData[] = $members->first(function ($value) use ($member) {
                return $value->id === (int)$member->attributes->member;
            })
                ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
        }

        $this->team_members = $membersData;

    }

    public static function normalizeData($object){
        $heroRightText = [];
        $heroLeftText = [];
        $sliderText = [];
        $teamText = [];
        $sliderPictures =[];

        if (array_key_exists('hero_right_text', $object)){
            foreach ($object["hero_right_text"] as $titleLine){
                $heroRightText[] = $titleLine["attributes"]["text"];
            }
            $object["hero_right_text"] = $heroRightText;
        }

        if (array_key_exists('hero_left_text', $object)){
            foreach ($object["hero_left_text"] as $titleLine){
                $heroLeftText[] = $titleLine["attributes"]["text"];
            }
            $object["hero_left_text"] = $heroLeftText;
        }

        if (array_key_exists('slider_text', $object)){
            foreach ($object["slider_text"] as $textLine){
                $sliderText[] = $textLine["attributes"]["text"];
            }
            $object["slider_text"] = $sliderText;
        }

        if (array_key_exists('team_text', $object)){
            foreach ($object["team_text"] as $teamTextLine){
                $teamText[] = [$teamTextLine["layout"] => $teamTextLine["attributes"]["text"]];
            }
            $object["team_text"] = $teamText;
        }

        if (array_key_exists('slider_pictures', $object)){
            foreach ($object["slider_pictures"] as $sliderPic){
                $sliderPictures[] = $sliderPic["attributes"]["picture"];
            }
            $object["slider_pictures"] = $sliderPictures;
        }

        return $object;

    }

    public function getFullData(){
        try{

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
