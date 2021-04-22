<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\NewsletterMailRequest;
use App\Mail\SendMailMessage;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(MailRequest $request){
//        $poruka = $request->get('emailText');
//        $mail = 'businessblog348@gmail.com';
//        Mail::to($mail)->send(new SendMailMessage($poruka));
//        Log::channel('userActions')->info('User sent message',[
//            'user_email' => session()->get('user')->email
//        ]);
        return redirect()->back()->with('success','Successfully sent');
    }

    public function subscribe(NewsletterMailRequest $request){
        try{
            $email = $request->get('email');
            $newsletter = new Newsletter();
            $newsletter->email = $email;
            $uspeh = $newsletter->save();
            if($uspeh){
                return redirect()->back()->with('success','Successfully sent');
            }
            else{
                return redirect()->back()->with('fail','Please try again later');

            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
