<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use DB;

class SlidersController extends Controller {

    public function getIndex() {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    public function getAdd() {
        return view('admin.pages.slider.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $active = $request->input('active');

        $data = array('image' => $image ,'active' => $active);
        $slider = Slider::create($data);

        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
        if (isset($id)) {
            $sliders = DB::table('sliders')
                ->select('sliders.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.slider.edit', compact('sliders'));
        }        
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'active' => 'required',
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
        $active = $request->input('active');

        $data = array('image' => $image ,'active' => $active);
        $slider = DB::table('sliders')->where('id','=', $id)->update($data);
        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
        if (isset($id)) {
            $slider = DB::table('sliders')->where('id','=', $id)->delete();
            $sliders = Slider::all();
            return view('admin.pages.slider.index', compact('sliders'));
        }
    }

}
