<?php

namespace App\Http\Controllers;

use App\Models\VacancyModel;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVacanciesList()
    {
        $data = VacancyModel::query()->select('vacancy_name', 'vacancy_top_text', 'vacancy_responsibilities', 'vacancy_bottom_text', 'vacancy_description')->get();
        $content = [];
        foreach ( $data as $oneArticle){
            $content[] = VacancyModel::getFullData($oneArticle);
        }

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
