<?php

namespace App\Http\Controllers;


use App\Http\Requests\JoinPopupPostRequest;
use App\Models\JoinPopupMessageModel;
//use App\Services\SendMailService;
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
}
