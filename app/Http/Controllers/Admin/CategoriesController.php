<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use DB;

class CategoriesController extends Controller
{
    public function getIndex() {
    	$categories = Categorie::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.category.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'cat_name_ar' => 'required',
            'cat_name_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'cat_name_ar.required' => 'Please insert Category Name in Arabic',
            'cat_name_en.required' => 'Please insert Category Name in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $icon = $request->input('image');
    	$cat_name_ar = $request->input('cat_name_ar');
        $cat_name_en = $request->input('cat_name_en');
    	$active = $request->input('active');
    	$data = array('icon' => $icon ,'cat_name_ar' => $cat_name_ar ,'cat_name_en' => $cat_name_en ,'active' => $active);
    	$category = Categorie::create($data);

        if ($category){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('categories')
                ->select('categories.*')
                ->where('cat_id','=', $id)
                ->get();
	        return view('admin.pages.category.edit', compact('categories'));
        }        
    }

    public function postEdit(Request $request) {
    	$v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'cat_name_ar' => 'required',
            'cat_name_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'cat_name_ar.required' => 'Please insert Category Name in Arabic',
            'cat_name_en.required' => 'Please insert Category Name in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $id = $request->input('s_id');        
        $icon = $request->input('image');        
        $cat_name_ar = $request->input('cat_name_ar');
        $cat_name_en = $request->input('cat_name_en');
        $active = $request->input('active');
        $data = array('icon' => $icon ,'cat_name_ar' => $cat_name_ar ,'cat_name_en' => $cat_name_en ,'active' => $active);
    	$category = DB::table('categories')->where('cat_id','=', $id)->update($data);

    	if ($category){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('categories')->where('cat_id','=', $id)->delete();
	    	$categories = Categorie::all();
            return view('admin.pages.category.index', compact('categories'));
	    }
    }

}
