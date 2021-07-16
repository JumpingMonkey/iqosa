<?php

namespace App\Http\Controllers;

use App\Models\Parts\FooterModel;
use App\Models\Parts\HeaderModel;
use App\Models\Parts\PreloaderModel;
use Illuminate\Http\Request;

class PagesPartsController extends Controller
{
    public function index()
    {
        $preloader = PreloaderModel::getPreloader();
        $header = HeaderModel::getHeader();
        $footer = FooterModel::getFooter();

        return response()->json([
            'status' => 'success',
            'preloader' => $preloader,
            'header' => $header,
            'footer' => $footer,
        ]);
    }
}
