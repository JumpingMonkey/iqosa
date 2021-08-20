<?php


namespace App\Services;


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

    public static function sendEmailToAdmin($popup,$postData)
    {
        $emailSetting = SendMailService::config();
        switch ($popup){
//            case 'career':
//                $email = $emailSetting->email_for_career;
//                $view = 'toAdminFromCareerPopup';
//                break;
            case 'work':
                $email = $emailSetting->email_for_work;
                $postData['clientMessage'] = $postData['message'];
                $view = 'toAdminFromWorkWithYou';
                break;
//            case 'my-special':
//                $email = $emailSetting->email_for_my_special;
//                $view = 'toAdminFromMySpecialPopup';
//                break;
//            case 'consortium':
//                $email = $emailSetting->email_for_career;
//                $view = 'toAdminFromConsortiumPopup';
//                break;
        }
//        dd($postData);


        Mail::send('email.'.$view, $postData, function($message) use ($emailSetting,$popup, $email) {
            $message->to($email,$emailSetting->name)->subject($emailSetting->name.': New mail from the '.$popup.' popup!');
            $message->from($emailSetting->email_for_send,$emailSetting->name);
        });
    }
}

