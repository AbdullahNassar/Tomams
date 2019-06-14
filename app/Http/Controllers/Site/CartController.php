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

class CartController extends Controller {

    public function getIndex($id) {
        $products =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->select('products.*','members.*','cart.*')
                ->where('cart.member_id','=', $id)
                ->get();

        $total =  DB::table('cart')
                ->join('products','products.p_id','=','cart.product_id')
                ->join('members','members.id','=','cart.member_id')
                ->where('cart.member_id','=',$id)
                ->sum('cart.c_price');

        $categories = Categorie::all();
        $subs = Sub::all();
        $contact = new Contact;
        $data = new Data;
        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.cart', compact('products','categories','subs','count','contact','cart','data','total'));
        }
        return view('site.pages.cart', compact('products','categories','subs','contact','data'));
        
    }

    public function checkout() {
        
        $categories = Categorie::all();
        $subs = Sub::all();
        $contact = new Contact;
        $data = new Data;
        if($member = Auth::guard('members')->check()){
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
            return view('site.pages.checkout', compact('products','categories','subs','count','contact','cart','data','total'));
        }
        return view('site.pages.checkout', compact('products','categories','subs','contact','data'));
        
    }

    public function paypal() {
        
        $categories = Categorie::all();
        $subs = Sub::all();
        $contact = new Contact;
        $data = new Data;
        if($member = Auth::guard('members')->check()){
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
                ->sum('products.sale_price');
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.paypal', compact('products','categories','subs','count','contact','cart','data','total'));
        }
        return view('site.pages.paypal', compact('products','categories','subs','contact','data'));
        
    }

    public function create($p_id,Request $r) {

        if (isset($p_id)) {
            if(Auth::guard('members')->check()){
                $member = Auth::guard('members')->user()->id;
                $old_price = DB::table('products')
                        ->where('p_id','=', $p_id)
                        ->sum('sale_price');
                $p = DB::table('cart')
                        ->where('product_id','=', $p_id)
                        ->sum('product_id');

                $m = DB::table('cart')
                        ->where('product_id','=', $p_id)
                        ->sum('member_id');

                if ($member == $m) {
                    if ($p == $p_id) {
                        $quantity = DB::table('cart')
                                ->where('product_id','=', $p_id)
                                ->sum('stock');
                        $stock = $quantity + 1;
                        $old_price = DB::table('products')
                                ->where('p_id','=', $p_id)
                                ->sum('sale_price');
                        $price = $stock * $old_price;
                        $color2 = $r->input('color');
                        $data = array('stock' => $stock ,'color' => $color2,'c_price' => $price);
                        $product = DB::table('cart')->where('product_id','=', $p_id)->update($data);
                        if ($product){
                            return ['status' => 'succes' ,'data' => 'تم اضافة المنتج الى حقيبة التسوق'];
                        }
                        return ['status' => false ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
                    }
                }else{
                    $stock2 = $r->input('quantity');
                    $color = $r->input('color');
                    $old_price = DB::table('products')
                            ->where('p_id','=', $p_id)
                            ->sum('sale_price');
                    if (isset($stock2) && isset($color)) {
                        $data = array('product_id' => $p_id,'member_id' => $member ,
                        'color' => $color,'stock' => $stock2,'c_price' => $old_price);
                        $p1 = DB::table('cart')->insert($data);
                        if ($p1){
                            return ['status' => 'succes' ,'data' => 'تم اضافة المنتج الى حقيبة التسوق'];
                        }
                        return ['status' => false ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
                    }else{
                        $data = array('product_id' => $p_id,'member_id' => $member ,
                        'c_price' => $old_price);
                        $p2 = DB::table('cart')->insert($data);

                        if ($p2){
                            return ['status' => 'succes' ,'data' => 'تم اضافة المنتج الى حقيبة التسوق'];
                        }
                        return ['status' => false ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
                    }
                }
                
            }else{
                return ['status' => false ,'data' => 'من فضلك قم بتسجيل الدخول اولا'];
            }       
        }
    }

    public function order($id,Request $r) {

        if (isset($id)) {
            if(Auth::guard('members')->check()){
                $total = $r->input('total');
                $date = $r->input('date');
                $data = array('mem_id' => $id ,'total_price' => $total,'created_at' => $date);
                $product = DB::table('orders')->insert($data);
                if ($product){
                    return ['status' => 'succes' ,'data' => 'تم اضافة الطلب بنجاح'];
                }
                return ['status' => false ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
            }
        }
    }

    public function edit($c_id,Request $request) {
        if (isset($c_id)) {
            if($member = Auth::guard('members')->check()){
                $quantity = $request->input('quantity');
                $color = $request->input('color');
                $old_price = DB::table('cart')
                        ->where('product_id','=', $c_id)
                        ->sum('c_price');
                $price = $quantity * $old_price;
                $data = array('stock' => $quantity ,'color' => $color,'c_price' => $price);
                $product = DB::table('cart')->where('product_id','=', $c_id)->update($data);
                return back();
            }
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('cart')->where('c_id','=', $id)->delete();
            return back();
        }
    }
}
