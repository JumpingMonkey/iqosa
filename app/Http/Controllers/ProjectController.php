<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProjectList()
    {
        $data = ProjectModel::query()->select('id', 'type', 'number', 'city', 'country', 'link', 'main_picture', 'release_date', 'area')->get();
        $content = [];
        foreach ( $data as $Projects){
            $content[] = ProjectModel::getFullData($Projects);
        }

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOneProject(Request $request)
    {
        $data = ProjectModel::query()->where('link', $request->slug)->firstOrFail();

        $content = $data->getFullDataOneProject();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
