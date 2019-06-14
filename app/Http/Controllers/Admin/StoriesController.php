<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Storie;
use DB;

class StoriesController extends Controller
{
    public function getIndex() {
        $stories = Storie::all();
        return view('admin.pages.story.index', compact('stories'));
    }

    public function getAdd() {
        return view('admin.pages.story.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'story_ar' => 'required',
            'story_en' => 'required',
            'active' => 'required',
        ] ,[
            'title_ar.required' => 'Please insert Story Author in Arabic',
            'title_en.required' => 'Please insert Story Author in English',
            'story_ar.required' => 'Please insert Story Content in Arabic',
            'story_en.required' => 'Please insert Story Content in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $title_ar = $request->input('title_ar');
        $title_en = $request->input('title_en');
        $story_ar = $request->input('story_ar');
        $story_en = $request->input('story_en');
        $active = $request->input('active');
        $data = array('title_ar' => $title_ar ,'title_en' => $title_en ,
            'story_ar' => $story_ar ,'story_en' => $story_en ,'active' => $active);
        $story = Storie::create($data);

        if ($story){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function getEdit($id) {
        if (isset($id)) {
            $stories = DB::table('stories')
                ->select('stories.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.story.edit', compact('stories'));
        }        
    }

    public function postEdit(Request $request,$id) {
        $v = validator($request->all() ,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'story_ar' => 'required',
            'story_en' => 'required',
            'active' => 'required',
        ] ,[
            'title_ar.required' => 'Please insert Story Author in Arabic',
            'title_en.required' => 'Please insert Story Author in English',
            'story_ar.required' => 'Please insert Story Content in Arabic',
            'story_en.required' => 'Please insert Story Content in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $title_ar = $request->input('title_ar');
        $title_en = $request->input('title_en');
        $story_ar = $request->input('story_ar');
        $story_en = $request->input('story_en');
        $active = $request->input('active');
        $data = array('title_ar' => $title_ar ,'title_en' => $title_en ,
            'story_ar' => $story_ar ,'story_en' => $story_en ,'active' => $active);

        if (isset($id)) {
            $story = DB::table('stories')->where('id','=', $id)->update($data);

            if ($story){
                return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
            }
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }

    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('stories')->where('id','=', $id)->delete();
            $stories = Storie::all();
            return view('admin.pages.story.index', compact('stories'));
        }
    }

}
