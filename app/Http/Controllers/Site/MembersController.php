<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Categorie;
use App\Slider;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use Config;
use App\Sub;
use Auth;
use App\Notifications\notify_me;
use DB;

class MembersController extends Controller {


    public function getIndex() {
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
            return view('site.pages.account', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact'));
        }

        return view('site.pages.account', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact'));
    }

    public function getItems($id) {
        $products =  DB::table('products')
                ->join('members','members.id','=','products.owner_id')
                ->select('products.*')
                ->where('products.owner_id','=', $id)
                ->get();

        $categories = Categorie::all();
        $subs = Sub::all();
        $contact = new Contact;
        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.items', compact('products','categories','subs','count','contact'));
        }
        return view('site.pages.items', compact('products','categories','subs','contact'));
        
    }

    public function getMessages($id) {
        $categories = Categorie::all();
        $subs = Sub::all();
        $sliders = Slider::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        
        $messages = DB::table('ownermessages')
            ->select('ownermessages.*')
            ->where('member_id','=', $id)
            ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $messagescount = DB::table('ownermessages')->select('ownermessages.id')->where('member_id', $id)->count();
            return view('site.pages.messages', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','messages','messagescount'));
        }
    }

    public function update(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            'instagram' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'details' => 'required',
        ] ,[
            'name.required' => 'Please Enter Name',
            'username.required' => 'Please Enter UserName',
            'email.required' => 'Please Enter E-mail',
            'country.required' => 'Please Enter Country',
            'facebook.required' => 'Please Enter Facebook',
            'twitter.required' => 'Please Enter Twitter',
            'google.required' => 'Please Enter Google',
            'instagram.required' => 'Please Enter Instagram',
            'phone.required' => 'Please Enter Phone',
            'address.required' => 'Please Enter Address',
            'details.required' => 'Please Enter Details',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        if(Auth::guard('members')->check()){
            $member = Member::find(Auth::guard('members')->user()->id);
            $member->name = $request->input('name');
            $member->username = $request->input('username');
            $member->email = $request->input('email');
            $member->country = $request->input('country');
            $member->facebook = $request->input('facebook');
            $member->twitter = $request->input('twitter');
            $member->google = $request->input('google');
            $member->instagram = $request->input('instagram');
            $member->phone = $request->input('phone');
            $member->address = $request->input('address');
            $member->details = $request->input('details');
            $destination = storage_path('uploads/members/');

            if ($request->image_name) {
                if (Auth::guard('members')->user()->avatar != null) {
                    unlink(storage_path('uploads/members/' . $member->avatar));
                }
                $member->avatar = md5(date('Y-m-d') . time()) . '_' . preg_replace('/[[:space:]]+/', '-', $request->image_name->getClientOriginalName());
                $request->image_name->move($destination, $member->avatar);
            }

            if ($member->save()){
                return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
            }
            return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];

        }

    }

    public function message(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required',
        ] ,[
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your E-mail',
            'phone.required' => 'Please Enter Your Phone',
            'address.required' => 'Please Enter Your Address',
            'message.required' => 'Please Enter Your Message',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $message = $request->input('message');
        $member_id = $request->input('member_id');
        $data = array('name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,
            'member_id'=>$member_id, 'message'=>$message);

        $m = DB::table('ownermessages')->insert($data);

        //Auth::guard('members')->user()->notify(new notify_me());

        if ($m){
                return ['status' => 'succes' ,'data' => 'Your Message is sent successfully'];
            }
            return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];
    }

}
