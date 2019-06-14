<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\Storie;
use App\Product;
use App\Data;
use App\Contact;
use App\Sub;
use Auth;
use DB;

class ProductController extends Controller {

    public function getIndex(){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $data = new Data;
        $contact = new Contact;
        $s_products = Product::get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
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
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products','sidebar','cart','products','total'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','s_products','sidebar'));
    }

    public function getCat($id){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $s_products = DB::table('products')
                ->join('categories','products.category_id','=','categories.cat_id')
                ->select('products.*','categories.cat_name_en')
                ->where('products.category_id','=', $id)
                ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
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
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','s_products','sidebar','cart','products','total'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','s_products','sidebar'));
    }

    public function getProduct($id){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $product = DB::table('products')
                ->select('products.*')
                ->where('p_id','=', $id)
                ->get();
        $g_images = DB::table('productimages')
            ->select('productimages.*')
            ->where('product_id','=', $id)
            ->get();

        $specifications = DB::table('specs')
            ->select('specs.*')
            ->where('product_id','=', $id)
            ->where('active','=', 1)
            ->get();

        $reviews = DB::table('reviews')
            ->join('products','products.p_id','=','reviews.product_id')
            ->select('reviews.*')
            ->where('product_id','=', $id)
            ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
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
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.product', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','product','g_images','reviews','cart','products','total','specifications'));
        }

        return view('site.pages.product', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','product','g_images','reviews','specifications'));
    }

    public function search(Request $request){

        $category = $request->input('category');
        $search = $request->input('search');

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $sidebar = DB::table('ads')->select('ads.image')->where('id', '=', 1)->get();
        $s_products = DB::table('products')
                ->select('products.*')
                ->where('name_ar', 'like', '%' . $search . '%')
                ->orWhere('content_ar', 'like', '%' . $search . '%')
                ->get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
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
            $cart = DB::table('cart')->select('cart.id')->where('member_id', $member)->count();
            return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','s_products','sidebar','cart','products','total'));
        }

        return view('site.pages.products', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','s_products','sidebar'));
    }

    public function review(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required'
        ] ,[
            'name.required' => 'من فضلك أدخل الاسم',
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
            'email.email' => 'من فضلك أدخل البريد الالكترونى',
            'review.required' => 'من فضلك أدخل التعليق الخاص بك'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
            $name = $request->input('name');
            $review = $request->input('review');
            $email = $request->input('email');
            $quality = $request->input('quality');
            $value = $request->input('value');
            $product_id = $request->input('id');
            $date = $request->input('date');

            $data = array(
                'quality'=>$quality,
                'product_id'=>$product_id,
                'name'=>$name,
                'email'=>$email,                
                'review'=>$review,
                'created_at'=>$date
            );

            $U = DB::table('reviews')->insert($data);

            if ($U){
                return ['status' => 'succes' ,'data' => 'تم ارسال تعليقك , شكرا'];
            }
            return ['status' => 'error' ,'data' => 'حدث خطأ , يرجى اعادة المحاولة'];
    }

    public function getAdd(){

        $categories = Categorie::all();
        $subs = Sub::all();
        $stories = Storie::all();
        $on_sale_products = Product::get()->where('on_sale','=', 1);
        $latest_products = Product::get()->where('latest','=', 1);
        $top_rated_products = Product::get()->where('top_rated','=', 1);
        $data = new Data;
        $contact = new Contact;
        $products = Product::get();

        if($member = Auth::guard('members')->check()){
            $member = Auth::guard('members')->user()->id;
            $count = DB::table('wishlist')->select('wishlist.id')->where('member_id', $member)->count();
            return view('site.pages.add', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','count','contact','products'));
        }

        return view('site.pages.add', compact('categories','subs','sliders','on_sale_products','latest_products','top_rated_products','data','stories','contact','products'));
    }

    public function insert(Request $request,$id) {
        $v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'content_ar' => 'required',
            'content_en' => 'required',
            'on_sale' => 'required',
            'quantity' => 'required',
            'cat_id' => 'required',
            'sub_id' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please insert Product Name in Arabic',
            'name_en.required' => 'Please insert Product Name in English',
            'content_ar.required' => 'Please insert Product Description in Arabic',
            'content_en.required' => 'Please insert Product Description in English',
            'price.required' => 'Please insert Product Price',
            'quantity.required' => 'Please insert Product Quantity',
            'cat_id.required' => 'Please insert Product Category',
            'sub_id.required' => 'Please insert Product Sub Category'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $image = $request->input('image');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $on_sale = $request->input('on_sale');
        $quantity = $request->input('quantity');
        $cat_id = $request->input('cat_id');
        $sub_id = $request->input('sub_id');

        $data = array('name_ar' => $name_ar ,'name_en' => $name_en ,
            'price' => $price,'sale_price' => $sale_price,
            'image' => $image ,'content_ar' => $content_ar ,'content_en' => $content_en ,
            'on_sale' => $on_sale ,'quantity' => $quantity ,'owner_id' => $id ,
            'category_id' => $cat_id ,'subc_id' => $sub_id );
        $product = Product::create($data);

        if ($product){
            return ['status' => 'succes' ,'data' => 'Product has been added successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }
}
