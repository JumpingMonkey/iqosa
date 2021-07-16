<?php

namespace App\Http\Controllers;


use App\Http\Requests\JoinPopupPostRequest;
use App\Http\Requests\SayHiPopupRequest;
use App\Http\Requests\WorkWithYouPopupRequest;
use App\Models\JoinPopupMessageModel;
//use App\Services\SendMailService;
use App\Models\Pages\WorkWithYouPageModel;
use App\Models\SayHiPopupMessageModel;
use App\Models\WorkWithYouPopupMessageModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopupsController extends Controller
{
    public function join_popup_post(JoinPopupPostRequest $request){

        $postData = $request->input();

        if($request->file !== null) {
            $postData['file']=$request->file->store('/');
        }else{
            $postData['file']=null;
        }

        $newClientMessage = new JoinPopupMessageModel($postData);
        $newClientMessage->save();

//        SendMailService::sendEmailToAdmin('career',$postData);
        return response()->json([
            'status' => 'success',
            'massage' => 'Request will be send!'
        ]);
    }

    public function say_hi_popup_post(SayHiPopupRequest $request){

        $postData = $request->input();

        if($request->resume !== null) {
            $postData['resume']=$request->resume->store('/');
        }else{
            $postData['resume']=null;
        }

        $newClientMessage = new SayHiPopupMessageModel($postData);
        $newClientMessage->save();

//        SendMailService::sendEmailToAdmin('career',$postData);
        return response()->json([
            'status' => 'success',
            'massage' => 'Request will be send!'
        ]);
    }

    public function work_with_you_popup_post(WorkWithYouPopupRequest $request){

        $postData = $request->input();

        $newClientMessage = new WorkWithYouPopupMessageModel($postData);
        $newClientMessage->save();

//        SendMailService::sendEmailToAdmin('career',$postData);
        return response()->json([
            'status' => 'success',
            'massage' => 'Request will be send!'
        ]);
    }
}
