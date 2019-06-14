<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Member;
use App\Categorie;
use App\Sub;
use DB;

class ProductsController extends Controller
{
    public function getIndex() {
        $products = Product::all();
        return view('admin.pages.product.index', compact('products'));
    }

    public function getAdd() {
        $owners = DB::table('members')
                ->select('members.*')
                ->where('members.type','=', 'owner')
                ->get();
        $categories = Categorie::all();
        $subs = Sub::all();
        return view('admin.pages.product.add', compact('owners','categories','subs'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'rate' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'content_ar' => 'required',
            'content_en' => 'required',
            'on_sale' => 'required',
            'top_rated' => 'required',
            'latest' => 'required',
            'quantity' => 'required',
            'owner_id' => 'required',
            'cat_id' => 'required',
            'sub_id' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please insert Product Name in Arabic',
            'name_en.required' => 'Please insert Product Name in English',
            'content_ar.required' => 'Please insert Product Description in Arabic',
            'content_en.required' => 'Please insert Product Description in English',
            'rate.required' => 'Please insert Product Rate',
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
        $rate = $request->input('rate');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $image = $request->input('image');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $on_sale = $request->input('on_sale');
        $top_rated = $request->input('top_rated');
        $latest = $request->input('latest');
        $quantity = $request->input('quantity');
        $owner_id = $request->input('owner_id');
        $cat_id = $request->input('cat_id');
        $sub_id = $request->input('sub_id');
        $active = $request->input('active');

        $data = array('name_ar' => $name_ar ,'name_en' => $name_en ,
            'rate' => $rate,'price' => $price,'sale_price' => $sale_price,
            'image' => $image ,'content_ar' => $content_ar ,'content_en' => $content_en ,
            'on_sale' => $on_sale ,'top_rated' => $top_rated ,'latest' => $latest ,
            'quantity' => $quantity ,'owner_id' => $owner_id ,'category_id' => $cat_id ,
            'subc_id' => $sub_id , 'active' => $active);
        $product = Product::create($data);

        if ($product){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
        if (isset($id)) {
            $products = DB::table('products')
                ->join('members','products.owner_id','=','members.id')
                ->join('categories','products.category_id','=','categories.cat_id')
                ->join('subs','products.subc_id','=','subs.sub_id')
                ->select('products.*','categories.*','members.id','members.name','subs.*')
                ->where('products.p_id','=', $id)
                ->get();
            $owners = DB::table('members')
                ->select('members.*')
                ->where('members.type','=', 'owner')
                ->get();
            $categories = Categorie::all();
            $subs = Sub::all();
            $images = DB::table('productimages')
                ->select('productimages.*')
                ->where('product_id','=', $id)
                ->get();
            return view('admin.pages.product.edit', compact('products','owners','categories','subs','images'));
        }        
    }

    public function postEdit(Request $request,$id) {
        $v = validator($request->all() ,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'rate' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'content_ar' => 'required',
            'content_en' => 'required',
            'on_sale' => 'required',
            'top_rated' => 'required',
            'latest' => 'required',
            'quantity' => 'required',
            'owner_id' => 'required',
            'cat_id' => 'required',
            'sub_id' => 'required',
            'active' => 'required'
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please insert Product Name in Arabic',
            'name_en.required' => 'Please insert Product Name in English',
            'content_ar.required' => 'Please insert Product Description in Arabic',
            'content_en.required' => 'Please insert Product Description in English',
            'rate.required' => 'Please insert Product Rate',
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
        $rate = $request->input('rate');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $image = $request->input('image');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $on_sale = $request->input('on_sale');
        $top_rated = $request->input('top_rated');
        $latest = $request->input('latest');
        $quantity = $request->input('quantity');
        $owner_id = $request->input('owner_id');
        $cat_id = $request->input('cat_id');
        $sub_id = $request->input('sub_id');
        $active = $request->input('active');

        $data = array('name_ar' => $name_ar ,'name_en' => $name_en ,
            'rate' => $rate,'price' => $price,'sale_price' => $sale_price,
            'image' => $image ,'content_ar' => $content_ar ,'content_en' => $content_en ,
            'on_sale' => $on_sale ,'top_rated' => $top_rated ,'latest' => $latest ,
            'quantity' => $quantity ,'owner_id' => $owner_id ,'category_id' => $cat_id,
            'subc_id' => $sub_id , 'active' => $active);

        if (isset($id)) {

            $product = DB::table('products')->where('p_id','=', $id)->update($data);
        
            if ($product){
                return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('products')->where('p_id','=', $id)->delete();
            $products = Product::all();
            return view('admin.pages.product.index', compact('products'));
        }
    }

    public function getPostImages(Request $request) {
        $id = $request->input('product');
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/products/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/products".'/'.$imageName;
            $data = array('image'=>$image_path,'product_id'=>$id);
            DB::table('productimages')->insert($data);
        }
    }

    public function addImages(Request $request) {
        $id = $request->input('product_id');
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/products/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/products".'/'.$imageName;
            $data = array('image'=>$image_path,'product_id'=>$id);
            DB::table('productimages')->insert($data);
        }
    }

    public function deleteImage(Request $request,$id)
    {
        $image = DB::table('productimages')
                ->select('productimages.image')
                ->where('id','=', $id)
                ->get();
        $p_id = $request->input('product_id');
        if (isset($id)) {
            $destination = storage_path('uploads/product'.$p_id.'/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            DB::table('productimages')->where('id','=', $id)->delete();
            return back();
        }
    }

    public function getGallery() {
        $products = Product::all();
        return view('admin.pages.product.gallery', compact('products'));
    }

}
