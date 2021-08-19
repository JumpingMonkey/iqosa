<?php

namespace App\Models;

use App\Traits\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class ProjectModel extends Model implements Sortable
{
    use HasFactory, HasTranslations, HasMediaToUrl, SortableTrait;

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected $table = "projects";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'type',
        'number',
        'link',
        'release_date',
        'area',
        'main_picture',
        'city',
        'country',
        'team_members',
        'content',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'city',
        'country',
        'content',
        'members',
    ];

    public $mediaToUrl = [
        'main_picture',
        'content',
        'image',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image',
        'members',
    ];


//    public function members()
//    {
//        return $this->belongsToMany(MemberModel::class);
//    }

    public function getMembersDataAttribute()
    {
        return json_decode($this["team_members"]);
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
        $content = [];

        if (array_key_exists('content', $object)){
            foreach ($object["content"] as $titleLine){
                if ($titleLine['layout'] == 'big_image') {
                    $content[] = [$titleLine['layout'] => $titleLine["attributes"]["image"]];
                }
                if ($titleLine['layout'] == 'gallery') {
                    $content[] = [$titleLine['layout'] => $titleLine["attributes"]];
                }
            }
            $object["content"] = $content;
        }



        return $object;

    }

    public static function getFullData(self $object){
        try{
            return $object->getAllWithMediaUrlWithout(['id', 'updated_at']);

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

    public function getFullDataOneProject(){
        try{
            $this->getMembers();
            return self::normalizeData($this->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
