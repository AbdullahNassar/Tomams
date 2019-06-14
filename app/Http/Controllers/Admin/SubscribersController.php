<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;
use App\Contacts;
use App\Subscriber;
use DB;

class SubscribersController extends Controller {

	public function getIndex()
    {
        $subscribers = DB::table('subscribers')
            ->select('subscribers.*')
            ->get();
        return view('admin.pages.subscriber.index', compact('subscribers'));
    }

    public function getEmail($id)
    {
        $subscribers = DB::table('subscribers')
            ->select('subscribers.*')
            ->where('id' , '=' , $id)
            ->get();
        return view('admin.pages.subscriber.email', compact('subscribers'));
    }

    public function getAll()
    {
        $subscribers = DB::table('subscribers')
            ->select('subscribers.email')
            ->get();
        return view('admin.pages.subscriber.all', compact('subscribers'));
    }

    public function sendEmail(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email',
            'content' => 'required'
        ] ,[
            'email.required' => 'Please Enter E-mail',
            'content.required' => 'Please Enter Subject',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $email = $request->input('email');
        $subject = $request->input('content');

        Mail::to($email)->send(new AdminMail($subject));
        return ['status' => 'succes' ,'data' => 'Mail has been sent successfully'];                
    }

    public function sendAll(Request $request)
    {
        $v = validator($request->all() ,[
            'content' => 'required'
        ] ,[
            'content.required' => 'Please Enter Subject',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $subs = DB::table('subscribers')
            ->select('subscribers.*')
            ->get();
        foreach($subs as $subscriber){
            $email = $subscriber->email;
            $subject = $request->input('content');
            Mail::to($email)->send(new AdminMail($subject));
        }
        return ['status' => 'succes' ,'data' => 'Mail has been sent successfully'];
    }
}
