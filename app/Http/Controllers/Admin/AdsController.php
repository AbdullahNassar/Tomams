<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ad;
use Alert;
use DB;

class AdsController extends Controller
{
    public function getIndex() {
    	$ads = Ad::all();
        return view('admin.pages.ad.index', compact('ads'));
    }

    public function getEdit($id) {
        if (isset($id)) {
            $ads = DB::table('ads')->select('ads.*')->where('id','=', $id)->get();
            return view('admin.pages.ad.edit', compact('ads'));
        }        
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
        ]);
        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $image = $request->input('image');
        $data = array('image' => $image);
        $ad = DB::table('ads')->where('id','=', $id)->update($data);
        if ($ad){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

}
