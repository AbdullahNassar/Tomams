<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Categorie;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use Config;
use App\Sub;
use Auth;
use DB;

class ProfileController extends Controller
{

    public function getIndex() {
        $categories = Categorie::all();
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $products =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->select('products.*','members.*','cart.*')
                ->where('cart.member_id','=', $member)
                ->get();

            $total =  DB::table('cart')
                    ->join('products','products.p_id','=','cart.product_id')
                    ->join('members','members.id','=','cart.member_id')
                    ->where('cart.member_id','=',$member)
                    ->sum('cart.c_price');
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            $owner = DB::table('members')
                ->select('members.*')
                ->where('members.id','=', $member)
                ->get();
            return view('site.pages.profile', compact('products','categories','subs','latest_products','data','stories','count','contact','owner','cart','products','total'));
        }

        return view('site.pages.profile', compact('categories','subs','latest_products','data','stories','contact','owner','products'));

    }

    public function dashboard() {
        $categories = Categorie::all();
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $products =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->select('products.*','members.*','cart.*')
                ->where('cart.member_id','=', $member)
                ->get();

            $total =  DB::table('cart')
                    ->join('products','products.p_id','=','cart.product_id')
                    ->join('members','members.id','=','cart.member_id')
                    ->where('cart.member_id','=',$member)
                    ->sum('cart.c_price');
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            $owner = DB::table('members')
                ->select('members.*')
                ->where('members.id','=', $member)
                ->get();
            return view('site.pages.dashboard', compact('products','categories','subs','latest_products','data','stories','count','contact','owner','cart','products','total'));
        }

        return view('site.pages.dashboard', compact('categories','subs','latest_products','data','stories','contact','owner','products'));

    }

    public function orders() {
        $categories = Categorie::all();
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $products =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->select('products.*','members.*','cart.*')
                ->where('cart.member_id','=', $member)
                ->get();

            $total =  DB::table('cart')
                    ->join('products','products.p_id','=','cart.product_id')
                    ->join('members','members.id','=','cart.member_id')
                    ->where('cart.member_id','=',$member)
                    ->sum('cart.c_price');
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            $owner = DB::table('members')
                ->select('members.*')
                ->where('members.id','=', $member)
                ->get();

            $orders = DB::table('orders')
                ->select('orders.*')
                ->where('mem_id','=', $member)
                ->get();

            $items =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->select('products.*','cart.*')
                ->where('cart.member_id','=', $member)
                ->get();
            return view('site.pages.orders', compact('products','categories','subs','latest_products','data','stories','count','contact','owner','cart','products','total','items','orders'));
        }

        return view('site.pages.orders', compact('categories','subs','latest_products','data','stories','contact','owner','products'));

    }
}
