<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\Pages\AboutUsPageModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
          public function getArticleList()
    {
        $data = ArticleModel::query()->select('id', 'title', 'link', 'main_picture', 'created_at')->get();
        $content = [];
        foreach ( $data as $oneArticle){
            $content[] = ArticleModel::getFullData($oneArticle);
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
    public function getOneArticle(Request $request)
    {
        $data = ArticleModel::query()->where('link', $request->slug)->first();
        $content = ArticleModel::getFullDataOneAtricle($data);

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }
}
