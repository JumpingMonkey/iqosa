<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\JoinPageModel;
use App\Models\VacancyModel;
use Illuminate\Http\Request;

class JoinPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
        public function index()
    {
        $dataVacancy = VacancyModel::query()->select('vacancy_name')->get();
        $vacancy = [];

        foreach ($dataVacancy as $vac){
            $vacancy[] = $vac->vacancy_name;
        }


        $data = JoinPageModel::firstOrFail();
        $content = $data->getFullData();
        $content['vacancy'] = $vacancy;

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }

}
