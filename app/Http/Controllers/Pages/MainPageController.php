<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\MainPageModel;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $data = MainPageModel::firstOrFail();

        $content = $data->getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);

    }
}
