<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\ProjectPageModel;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = ProjectPageModel::firstOrFail();
        $content = $data->getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
