<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\ProjectsPageModel;
use Illuminate\Http\Request;

class ProjectsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = ProjectsPageModel::firstOrFail();
        $content = $data->getFullData();

        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
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
     * @param  \App\Models\Pages\ProjectsPageModel  $projectsPageModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectsPageModel $projectsPageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages\ProjectsPageModel  $projectsPageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectsPageModel $projectsPageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages\ProjectsPageModel  $projectsPageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectsPageModel $projectsPageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages\ProjectsPageModel  $projectsPageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectsPageModel $projectsPageModel)
    {
        //
    }
}
