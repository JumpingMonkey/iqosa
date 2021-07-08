<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\AboutUsPageModel;
use App\Models\Pages\MainPageModel;
use ClassicO\NovaMediaLibrary\API;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
//        $data = AboutUsPageModel::firstOrFail();

//        $content = $data->getFullData();

        $files = API::getFiles(1);
        dd($files);
//        return response()->json([
//            'status' => 'success',
//            'content' => $data,
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages\AboutUsPageModel  $aboutUsPageModel
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsPageModel $aboutUsPageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages\AboutUsPageModel  $aboutUsPageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsPageModel $aboutUsPageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages\AboutUsPageModel  $aboutUsPageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUsPageModel $aboutUsPageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages\AboutUsPageModel  $aboutUsPageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsPageModel $aboutUsPageModel)
    {
        //
    }
}
