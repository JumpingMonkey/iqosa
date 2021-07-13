<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Error404PageModel;
use Illuminate\Http\Request;

class Error404PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Error404PageModel::firstOrFail();
        $content = $data->getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
