<?php


namespace App\Services;


use App\Http\Requests\JoinPopupPostRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailSetting;
use function Symfony\Component\String\b;

class SendMailService
{

    private static function config()
    {
        $emailSetting = EmailSetting::firstOrFail();
        config([
            "mail.mailers.smtp.username" => $emailSetting->email_for_send,
            "mail.mailers.smtp.password" => $emailSetting->password,
        ]);
        return $emailSetting;

    }

//    public static function sendEmailToMySpecialUserRequest($model)
//    {
//        $emailSetting = SendMailService::config();
//        $data = array('name' => $model->name, 'code' => $model->code);
//        Mail::send('email.AccessGranted', $data, function($message) use ($emailSetting,$model) {
//            $message->to($model->email, $model->name)->subject($emailSetting->name.': Access granted!');
//            $message->from($emailSetting->email_for_send,$emailSetting->name);
//        });
//    }

    public static function sendEmailToAdmin($popup,$postData, JoinPopupPostRequest $request = null)
    {
        $emailSetting = SendMailService::config();
        switch ($popup){
            case 'sayHi':
                $email = $emailSetting->email_for_say_hi;
                $postData['clientMessage'] = $postData['message'];
                $view = 'toAdminFromSayHi';
                break;
            case 'work':
                $email = $emailSetting->email_for_work;
                $postData['clientMessage'] = $postData['message'];
                $view = 'toAdminFromWorkWithYou';
                break;
            case 'join':
                $email = $emailSetting->email_for_join;
                $view = 'toAdminFromJoin';
                break;
        }

        Mail::send('email.'.$view, $postData, function($message) use ($emailSetting,$popup, $email, $request, $postData) {
            $message->to($email,$emailSetting->name)->subject($emailSetting->name.': New mail from the '.$popup.' popup!');
            $message->from($emailSetting->email_for_send,$emailSetting->name);

            if(isset($postData['file'])) {
                $message->attach($request->file('file')->getRealPath(), [
                    'as' => $request->file('file')->getClientOriginalName(),
                    'mime' => $request->file('file')->getMimeType()
                ]);
            }
        });
    }
}

