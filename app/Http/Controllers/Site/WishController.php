<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Contact;
use App\Data;
use App\Sub;
use Auth;
use DB;

class WishController extends Controller {

    public function getIndex($id) {
        $s_products =  DB::table('wishlist')
                ->join('products','products.p_id','=','wishlist.product_id')
                ->join('members','members.id','=','wishlist.member_id')
                ->select('products.*','members.*','wishlist.w_id')
                ->where('wishlist.member_id','=', $id)
                ->get();

        $categories = Categorie::all();
        $subs = Sub::all();
        $data = new Data;
        $contact = new Contact;
        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            $products =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->select('products.*','members.*','cart.c_id')
                ->where('cart.member_id','=', Auth::guard('members')->user()->id)
                ->get();
            $total =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->where('cart.member_id','=',$id)
                ->sum('cart.c_price');
            return view('site.pages.wishlist', compact('s_products','categories','subs','count','contact','cart','data','products','total'));
        }
        return view('site.pages.wishlist', compact('products','categories','subs','contact','data'));
        
    }

    public function create($p_id,Request $r) {
        if (isset($p_id)) {
            $v = validator($r->all() ,[
                'product_id' => 'required|unique:cart,product_id',
            ] ,[
                'product_id.required' => 'لقد تم اضافة هذا المنتج من قبل',
                'product_id.unique' => 'لقد تم اضافة هذا المنتج من قبل',
            ]);

            if ($v->fails()){
                return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
            }
            if($member = Auth::guard('members')->check()){
                $member = Auth::guard('members')->user()->id;
                $data = array('member_id' => $member ,'product_id' => $p_id);
                $product = DB::table('wishlist')->insert($data);
                if ($product){
                    return ['status' => 'succes' ,'data' => 'تم اضافة المنتج الى القائمة المفضلة'];
                }
                return ['status' => false ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
            }else{
                return ['status' => false ,'data' => 'من فضلك قم بتسجيل الدخول اولا'];
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
