<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class PostsController extends Controller
{
    public function getIndex() {
    	$posts = Post::all();
        return view('admin.pages.post.index', compact('posts'));
    }

    public function getAdd() {
        $users = User::all();
        return view('admin.pages.post.add', compact('users'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'head_ar' => 'required',
            'head_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'user_id' => 'required',
            'active' => 'required',
            'created_at' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'title_ar.required' => 'Please insert Post Title in Arabic',
            'title_en.required' => 'Please insert Post Title in English',
            'head_ar.required' => 'Please insert Post Header in Arabic',
            'head_en.required' => 'Please insert Post Header in English',
            'content_ar.required' => 'Please insert Post Content in Arabic',
            'content_en.required' => 'Please insert Post Content in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $title_ar = $request->input('title_ar');
        $title_en = $request->input('title_en');
        $head_ar = $request->input('head_ar');
        $head_en = $request->input('head_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $image = $request->input('image');
        $user_id = $request->input('user_id');
        $active = $request->input('active');
        $created_at = $request->input('created_at');

        $data = array('title_ar' => $title_ar ,'title_en' => $title_en ,
            'head_ar' => $head_ar ,'head_en' =>$head_en ,'content_ar' => $content_ar ,
            'content_en' => $content_en , 'image' => $image ,'active' => $active,
            'user_id' => $user_id , 'created_at' => $created_at);

        $p = Post::create($data);
        if ($p){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $posts = DB::table('posts')
                ->join('users','posts.user_id','=','users.id')
                ->select('posts.*','users.name')
                ->where('posts.id','=', $id)
                ->get();

            $users = User::all();
            return view('admin.pages.post.edit', compact('posts','users'));
        }        
    }

    public function postEdit(Request $request) {
        
        $v = validator($request->all() ,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'head_ar' => 'required',
            'head_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'user_id' => 'required',
            'active' => 'required',
            'created_at' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'title_ar.required' => 'Please insert Post Title in Arabic',
            'title_en.required' => 'Please insert Post Title in English',
            'head_ar.required' => 'Please insert Post Header in Arabic',
            'head_en.required' => 'Please insert Post Header in English',
            'content_ar.required' => 'Please insert Post Content in Arabic',
            'content_en.required' => 'Please insert Post Content in English',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $title_ar = $request->input('title_ar');
        $title_en = $request->input('title_en');
        $head_ar = $request->input('head_ar');
        $head_en = $request->input('head_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $image = $request->input('image');
        $user_id = $request->input('user_id');
        $active = $request->input('active');
        $created_at = $request->input('created_at');

        $data = array('title_ar' => $title_ar ,'title_en' => $title_en ,
            'head_ar' => $head_ar ,'head_en' =>$head_en ,'content_ar' => $content_ar ,
            'content_en' => $content_en , 'image' => $image ,'active' => $active,
            'user_id' => $user_id , 'created_at' => $created_at);

        $p = DB::table('posts')->where('id','=', $id)->update($data);
        if ($p){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
        if (isset($id)) {
            $p = DB::table('posts')->where('id','=', $id)->delete();
            $posts = Post::all();
            return view('admin.pages.post.index', compact('posts'));
        }
    }

}
