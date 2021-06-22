<?php

use App\Models\Member;
use App\Models\Project;
use App\Services\Localization\LocalizationService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('add', function () {

    Member::create([
        "name" => [
            "en" => "Vladimir",
            "ru" => "Владимир",
            "uk" => "Володимир"
        ],
        "surname" => [
            "en" => "Ivanov",
            "ru" => "Иванов",
            "uk" => "Iванов"
        ],
        "position" => [
            "en" => "Programmer",
            "ru" => "Программист",
            "uk" => "Програмiст"
        ],
        "about" => [
            "en" => "1",
            "ru" => "2",
            "uk" => "3"
        ],
        "photo" => "photo link",
        "parallax_photo" => "parallax photo link",
    ]);

    Member::create([
        "name" => [
            "en" => "Valera",
            "ru" => "Валера",
            "uk" => "Валера"
        ],
        "surname" => [
            "en" => "Petrov",
            "ru" => "Петров",
            "uk" => "Петров"
        ],
        "position" => [
            "en" => "Programmer",
            "ru" => "Программист",
            "uk" => "Програмiст"
        ],
        "about" => [
            "en" => "1",
            "ru" => "2",
            "uk" => "3"
        ],
        "photo" => "photo link",
        "parallax_photo" => "parallax photo link",
    ]);

    Project::create([
      'seo_title' => ["en" => "1", "ru"=> "2", "uk"=> "3"],
      'meta_description' => ["en" => "1", "ru" => "2", "uk" => "3"],
      'type' => 2,
      'number' => 2,
      'full_name' => 2,
      'release_date' => 2,
      'area' => 2,
      'main_picture' => 2,
      'city' => ["en" => "1", "ru" => "2", "uk" => "3"],
      'country' => ["en" => "1", "ru" => "2", "uk" => "3"],
    ]);

    Project::create([
      'seo_title' => ["en" => "12", "ru"=> "22", "uk"=> "32"],
      'meta_description' => ["en" => "12", "ru" => "22", "uk" => "32"],
      'type' => 22,
      'number' => 22,
      'full_name' => 22,
      'release_date' => 22,
      'area' => 22,
      'main_picture' => 22,
      'city' => ["en" => "12", "ru" => "22", "uk" => "32"],
      'country' => ["en" => "12", "ru" => "22", "uk" => "32"],
    ]);


});

Route::get('/', function () {
    return view('welcome');
});
