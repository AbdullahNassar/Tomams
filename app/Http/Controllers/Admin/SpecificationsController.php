<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sub;
use App\Product;
use DB;

class SpecificationsController extends Controller
{
    public function getIndex() {
    	$specifications = DB::table('specs')
                ->join('products','specs.product_id','=','products.p_id')
                ->select('specs.*','products.*')
                ->get();
        return view('admin.pages.specification.index', compact('specifications'));
    }

    public function getAdd() {
        $products = Product::all();
        return view('admin.pages.specification.add', compact('products'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'specification' => 'required',
            'description' => 'required',
            'active' => 'required',
            'p_id' => 'required'
        ] ,[
            'specification.required' => 'Please insert Specification',
            'description.required' => 'Please insert Description',
            'p_id.required' => 'Please Select Product',
            'active.required' => 'Please Select Activation Status'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$specification = $request->input('specification');
        $description = $request->input('description');
    	$active = $request->input('active');
        $p_id = $request->input('p_id');
    	$data = array('product_id' => $p_id,'specification' => $specification ,'description' => $description ,'active' => $active);
        $sub = DB::table('specs')->insert($data);

        if ($sub){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $specifications = DB::table('specs')
                ->join('products','specs.product_id','=','products.p_id')
                ->select('specs.*','products.*')
                ->where('specs.id','=', $id)
                ->get();
            $products = Product::all();
	        return view('admin.pages.specification.edit', compact('specifications','products'));
        }        
    }

    public function postEdit(Request $request) {
    	$v = validator($request->all() ,[
            'specification' => 'required',
            'description' => 'required',
            'active' => 'required',
            'p_id' => 'required'
        ] ,[
            'specification.required' => 'Please insert Specification',
            'description.required' => 'Please insert Description',
            'p_id.required' => 'Please Select Product',
            'active.required' => 'Please Select Activation Status'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $id = $request->input('s_id');     
        $specification = $request->input('specification');
        $description = $request->input('description');
        $active = $request->input('active');
        $p_id = $request->input('p_id');
        $data = array('product_id' => $p_id,'specification' => $specification ,'description' => $description ,'active' => $active);

    	$sub = DB::table('specs')->where('id','=', $id)->update($data);

    	if ($sub){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('specs')->where('id','=', $id)->delete();
            return back();
	    }
    }

}
