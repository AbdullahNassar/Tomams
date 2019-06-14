<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Contact;
use App\Sub;
use Auth;
use DB;

class WishlistController extends Controller {

    public function getIndex($id) {
        $products =  DB::table('wishlist')
                ->join('products','products.p_id','=','wishlist.product_id')
                ->join('members','members.id','=','wishlist.member_id')
                ->select('products.*','members.*','wishlist.w_id')
                ->where('wishlist.member_id','=', $id)
                ->get();

        $categories = Categorie::all();
        $subs = Sub::all();
        $contact = new Contact;
        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.wishlist', compact('products','categories','subs','count','contact'));
        }
        return view('site.pages.wishlist', compact('products','categories','subs','contact'));
        
    }

    public function create($p_id) {
        if (isset($p_id)) {
            if($member = Auth::guard('members')->check()){
                $member = Auth::guard('members')->user()->id;
                $data = array('member_id' => $member ,'product_id' => $p_id);
                $product = DB::table('wishlist')->insert($data);
                if ($product){
                    return ['status' => 'succes' ,'data' => 'Product is added to WishList successfully'];
                }
                return ['status' => false ,'data' => 'Something went wrong , please try again'];
            }else{
                return ['status' => false ,'data' => 'Please Login First'];
            }       
        }
        
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('wishlist')->where('w_id','=', $id)->delete();
            return back();
        }
    }
}
