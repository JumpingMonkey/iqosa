<?php

use App\Http\Controllers\Pages\AboutUsPageController;
use App\Http\Controllers\Pages\MainPageController;
use App\Http\Controllers\Pages\ProjectPageController;
use App\Http\Controllers\Pages\ProjectsPageController;
use App\Http\Controllers\PagesPartsController;
use App\Http\Middleware\LocaleMiddleware;
use App\Models\MemberModel;
use App\Nova\MemberResource;
use App\Services\Translation\Translation;
use ClassicO\NovaMediaLibrary\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::group(['prefix' => LocaleMiddleware::getLocale()], function () {
//    Route::get('/get', function () {
//
//        $member = MemberResource::find(1);
//
//        return response()->json(Translation::translateModelWithoutIdAndTime($member));
//    });
//});

Route::middleware('locale')->group(function (){
    Route::get('/main', [MainPageController::class, 'index']);
    Route::get('/parts', [PagesPartsController::class, 'index']);
    Route::get('/about',[AboutUsPageController::class, 'index']);
    Route::get('/projects', [ProjectsPageController::class, 'index']);
    Route::get('/project', [ProjectPageController::class, 'index']);
});





//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
