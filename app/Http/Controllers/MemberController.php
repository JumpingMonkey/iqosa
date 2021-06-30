<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\MemberModel;
use App\Models\Pages\AboutPlugPageModel;
use App\Models\Pages\AboutUsPageModel;
use App\Models\Pages\BlogPageModel;
use App\Models\Pages\CareerPageModel;
use App\Models\Pages\ContactsPageModel;
use App\Models\Pages\Error404PageModel;
use App\Models\Pages\JoinPageModel;
use App\Models\Pages\MainPageModel;
use App\Models\Pages\MediaPageModel;
use App\Models\Pages\PrivacyPolicyPageModel;
use App\Models\Pages\ProjectPageModel;
use App\Models\Pages\ProjectsPageModel;
use App\Models\Pages\SayHiPageModel;
use App\Models\Pages\WorkWithYouPageModel;
use App\Models\Parts\FooterModel;
use App\Models\Parts\HeaderModel;
use App\Models\Parts\PreloaderModel;
use App\Models\ProjectModel;
use App\Models\VacancyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MemberController extends Controller
{
    public function get(Request $request)
    {
//        Для перевода конкретного поля просто обратимся к нему $project->name


//        $page = MemberModel::find(1)->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = ArticleModel::find(2)
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Project detail page
//        $page = ProjectModel::find(1)
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        $memberIds = array();
//        foreach ($page["team_members"] as $member) {
//            array_push($memberIds, intval($member["attributes"]["member"]));
//        }
//        $memberIdsOrdered = implode(',', $memberIds);
//        $members = MemberModel::whereIn('id', $memberIds)
//            ->orderByRaw("FIELD(id, $memberIdsOrdered)")
//            ->get();
//        $membersData = array();
//        for ($i = 0; $i < count($members); $i++) {
//            $membersData[$i] = $members[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        $page["team_members"] = $membersData;


//        $project = ProjectsPageModel::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


//        Страница проектов
//        $page = ProjectsPageModel::first()
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
//        $projects = ProjectModel::select('type', 'number', 'link', 'main_picture', 'release_date', 'city', 'country', 'area')
//            ->get();
//        $projectsData = array();
//        if ($projects){
//            for ($i = 0; $i < count($projects); $i++){
//                $projectsData[$i] = $projects[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//            }
//        }
//        $page["projects"] = $projectsData;


//        Сортировка и перевод проектов для главной страницы
//        $page = MainPageModel::first()
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
//        $memberIdsOrdered = implode(',', $memberIds);
//        $projects = ProjectModel::select('type', 'number', 'link', 'main_picture', 'release_date', 'city', 'country', 'area')
//            ->whereIn('id', $projectIds)
//            ->orderByRaw("FIELD(id, $projectIdsOrdered)")
//            ->get();
//        $members = MemberModel::whereIn('id', $memberIds)
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


//        $page = ProjectsPageModel::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = HeaderModel::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $page = PreloaderModel::first()->content;

//        $page = FooterModel::first()
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $pageProject = ProjectModel::find(1);
//            ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at', 'seo_title', 'meta_description', 'link']);

//        $page["project"] = $pageProject->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

//        $pageNext = ProjectModel::where('id', '>', $pageProject->id)
//            ->orderBy('id','asc')
//            ->first();

//        $page["next"] = $pageNext;


        //About us
//        $page = AboutUsPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        $memberIds = array();
//        foreach ($page["team_members"] as $member){
//            array_push($memberIds, intval($member["attributes"]["member"]));
//        }
//        $memberIdsOrdered = implode(',', $memberIds);
//        $members = MemberModel::whereIn('id', $memberIds)
//            ->orderByRaw("FIELD(id, $memberIdsOrdered)")
//            ->get();
//        $membersData = array();
//        for ($i = 0; $i < count($members); $i++){
//            $membersData[$i] = $members[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        $page["team_members"] = $membersData;


        // About plug
//        $page = AboutPlugPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Blog
//        $page = BlogPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Media
//        $page = MediaPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Contacts
//        $page = ContactsPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


//         Career
//        $page = CareerPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        $vacancies = VacancyModel::all();
//        $vacanciesData = [];
//        for ($i = 0; $i < count($vacancies); $i++) {
//            $vacanciesData[$i] = $vacancies[$i]->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        $page['vacancies'] = $vacanciesData;


        // Privacy Policy
//        $page = PrivacyPolicyPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Join
//        $page = JoinPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Say hi
//        $page = SayHiPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);


        // Work with you
//        $page = WorkWithYouPageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        // 404 error
        $page = Error404PageModel::first()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'project' => $page,
        ]);
    }
}
