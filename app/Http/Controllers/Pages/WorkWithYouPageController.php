<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\WorkWithYouPageModel;
use Illuminate\Http\Request;

class WorkWithYouPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = WorkWithYouPageModel::firstOrFail();
        $content = $data->getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
