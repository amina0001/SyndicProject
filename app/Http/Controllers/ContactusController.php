<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Mail;
use App\mailcontact;

class ContactusController extends Controller
{
    public function sendMessage(Request $request)
    {

        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->form_subject,
            'user_message'=>$request->user_message,
        );
        Mail::send('email',$data,function ($message)
    {
        $message->from(env('MAIL_USERNAME', 'syndictn@gmail.com'));
        $message->to(env('APP_SUP_MAIL', 'aminarais03@gmail.com'))->subject('syndicTn contactez nous');
    }
        );
        return back()->with('success','sucesss');
    }
}