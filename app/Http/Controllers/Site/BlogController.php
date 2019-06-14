<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use App\Slider;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use App\Sub;
use Auth;
use DB;

class BlogController extends Controller
{
    public function getPosts(){
        $post = DB::table('posts')
                ->join('users','users.id','=','posts.user_id')
                ->select('posts.*','users.name')
                ->where('posts.active','=', 1)
                ->get();
        $categories = Categorie::all();
    	$subs = Sub::all();
    	$data = new Data;
        $contact = new Contact;

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.posts', compact('categories','subs','data','count','contact','post'));
        }

        return view('site.pages.posts', compact('categories','subs','data','contact','post'));
    }

    public function getPost($id){
        $post = DB::table('posts')
                ->join('users','users.id','=','posts.user_id')
                ->select('posts.*','users.name')
                ->where('posts.id','=', $id)
                ->get();
        $posts = DB::table('posts')
                ->join('users','users.id','=','posts.user_id')
                ->select('posts.*','users.name')
                ->get();
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
            return view('site.pages.post', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','post','posts'));
        }

        return view('site.pages.post', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','post','posts'));
    }

    public function search(Request $request){

        $search = $request->input('search');
        $post = DB::table('posts')
                ->join('users','users.id','=','posts.user_id')
                ->select('posts.*','users.name')
                ->where('posts.title_en', 'like', '%' . $search . '%')
                ->orWhere('posts.content_en', 'like', '%' . $search . '%')
                ->orWhere('posts.head_en', 'like', '%' . $search . '%')
                ->orWhere('users.name', 'like', '%' . $search . '%')
                ->get();

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
            return view('site.pages.posts', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','post'));
        }

        return view('site.pages.posts', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','post'));
    }
}
