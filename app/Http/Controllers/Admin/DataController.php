<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data;
use DB;

class DataController extends Controller {

	public function getData()
    {
        $statics = DB::table('statics')
            ->select('statics.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.data', compact('statics'));
    }


    public function updateData(Request $request)
    {

        $v = validator($request->all() ,[
            'about_ar' => 'required',
            'about_en' => 'required',
            'header_ar' => 'required',
            'header_en' => 'required',
            'transfer' => 'required',
        ] ,[
            'about_ar.required' => 'Please insert About Content in Arabic',
            'about_en.required' => 'Please insert About Content in English',
            'header_ar.required' => 'Please insert Header Content in Arabic',
            'header_en.required' => 'Please insert Header Content in English',
            'transfer.required' => 'Please insert Shipping Percentage',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $about_ar = $request->input('about_ar');
        $about_en = $request->input('about_en');
        $header_ar = $request->input('header_ar');
        $header_en = $request->input('header_en');
        $transfer = $request->input('transfer');

        $data = array('about_ar' => $about_ar,
         'about_en' => $about_en, 'header_ar' => $header_ar,
         'header_en' => $header_en, 'transfer' => $transfer);
        
        $d = DB::table('statics')->where('id', 1)->update($data);
        
            if ($d){
                return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }
}
