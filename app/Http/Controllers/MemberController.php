<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Member;
use App\Models\Pages\MainPage;
use App\Models\Pages\ProjectPage;
use App\Models\Pages\ProjectsPage;
use App\Models\Parts\Footer;
use App\Models\Parts\Header;
use App\Models\Parts\Preloader;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MemberController extends Controller
{
    public function get(Request $request)
    {
//        Для перевода конкретного поля просто обратимся к нему $project->name


//        $page = Member::find(1)
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = Article::find(2)
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = Project::with('members')->find(2)
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $project = ProjectsPage::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


//        Страница проектов
//        $page = ProjectsPage::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        if ($page["projects_title"]){
//            $pageTitle = array();
//            foreach ($page["projects_title"] as $line){
//                array_push($pageTitle, [$line["layout"] => $line["attributes"]["text"]]);
//            }
//            $page["projects_title"] = $pageTitle;
//        }
//        if ($page["projects_subtitle"]){
//            $pageSubtitle = array();
//            foreach ($page["projects_subtitle"] as $line){
//                array_push($pageSubtitle, $line["attributes"]["text"]);
//            }
//            $page["projects_subtitle"] = $pageSubtitle;
//        }
//        $projects = Project::select('type', 'number', 'link', 'main_picture', 'release_date', 'city', 'country', 'area')
//            ->get();
//        $projectsData = array();
//        if ($projects){
//            for ($i = 0; $i < count($projects); $i++){
//                $projectsData[$i] = $projects[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//            }
//        }
//        $page["projects"] = $projectsData;


//        Сортировка и перевод проектов для главной страницы return $main

//        $page = MainPage::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        $projectIds = array();
//        $memberIds = array();
//        foreach ($page["projects"] as $project){
//            array_push($projectIds, intval($project["attributes"]["project"]));
//        }
//        foreach ($page["team_members"] as $member){
//            array_push($memberIds, intval($member["attributes"]["member"]));
//        }
//        $projectIdsOrdered = implode(',', $projectIds);
//        $memberIdsOrdered = implode(',', $projectIds);
//        $projects = Project::select('type', 'number', 'link', 'main_picture', 'release_date', 'city', 'country', 'area')
//            ->whereIn('id', $projectIds)
//            ->orderByRaw("FIELD(id, $projectIdsOrdered)")
//            ->get();
//        $members = Member::whereIn('id', $memberIds)
//            ->orderByRaw("FIELD(id, $memberIdsOrdered)")
//            ->get();
//        $projectsData = array();
//        $membersData = array();
//        for ($i = 0; $i < count($projects); $i++){
//            $projectsData[$i] = $projects[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        for ($i = 0; $i < count($members); $i++){
//            $membersData[$i] = $members[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        $page["projects"] = $projectsData;
//        $page["team_members"] = $membersData;


//        $page = ProjectsPage::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = ProjectPage::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = Header::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = Preloader::first()->content;

//        $page = Footer::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $pageProject = Project::find(1);
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at', 'seo_title', 'meta_description', 'link']);

//        $page["project"] = $pageProject->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $pageNext = Project::where('id', '>', $pageProject->id)
//            ->orderBy('id','asc')
//            ->first();

//        $page["next"] = $pageNext;

        ;

//        dd($request->url());

//        if($page["share_facebook"]){
//            $page["share_facebook_link"] = "https://www.facebook.com/sharer.php?s=100&p[title]=IQ-98-KD&u=https://iqosa.com/ru/project/iq-98-kd/&t=IQ-98-KD&p[summary]=&p[url]=https://iqosa.com/ru/project/iq-98-kd/";
//        }
//
//        if($page["share_twitter"]){
//            $page["share_twitter_link"] = "https://twitter.com/intent/tweet?url=https://iqosa.com/ru/project/iq-98-kd/&text=IQ-98-KD";
//        }
//
//        if($page["share_linkedin"]){
//            $page["share_linkedin_link"] = "https://www.linkedin.com/shareArticle?mini=true&url=https://iqosa.com/ru/project/iq-98-kd/&title=IQ-98-KD";
//        }

        return response()->json([
            'status' => 'success',
            'project' => $page,
        ]);
    }
}
