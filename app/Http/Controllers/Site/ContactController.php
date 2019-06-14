<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\notify_me;
use App\Categorie;
use App\Slider;
use App\Storie;
use App\Product;
use App\Subscriber;
use App\Data;
use App\Contact;
use App\Sub; 
use Auth;
use DB;

class ContactController extends Controller
{
    public function getIndex()
    {
        $categories = Categorie::all();
        $subs = Sub::all();
        $sliders = Slider::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.contact', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact'));
        }

        return view('site.pages.contact', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact'));
    }

    public function message(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ] ,[
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your E-mail',
            'phone.required' => 'Please Enter Your Phone',
            'message.required' => 'Please Enter Your Message',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');
        $data = array('name'=>$name,'email'=>$email,'phone'=>$phone, 'message'=>$message);

        $m = DB::table('messages')->insert($data);

        if ($m){
                if (Auth::guard('admins')->check()){
                    Auth::guard('admins')->user()->notify(new notify_me());
                }
                return ['status' => 'succes' ,'data' => 'Your Message is sent successfully'];
            }
            return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];
    }
}
