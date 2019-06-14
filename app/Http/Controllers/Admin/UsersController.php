<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use DB;

class UsersController extends Controller {


    public function getIndex() {
        $users = User::get();

        return view('admin.pages.users.index', compact('users'));
    }

    public function getUser($id)
    {
        if (isset($id)) {
            $users = DB::table('users')
                    ->select('users.*')
                    ->where('id', '=', $id)
                    ->get();

            return view('admin.pages.users.edit', compact('users'));
        }
    }

    public function getU($id)
    {
        if (isset($id)) {
            $users = DB::table('users')
                        ->select('users.*')
                        ->where('id', '=', $id)
                        ->get();

            return view('admin.pages.users.delete', compact('users'));
        }
    }

    public function deleteU($id)
    {
        if (isset($id)) {
            DB::table('users')->where('id','=', $id)->delete();
            $users = User::get();
            return view('admin.pages.users.index', compact('users'));
        }
    }

    public function getAdd() {

        return view('admin.pages.users.add');
    }

    public function insertUser(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'username' => 'required',
            'type' => 'required',
            'email' => 'required',
            'password' => 'required',
            'country' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            'instagram' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name.required' => 'Please insert Name',
            'username.required' => 'Please insert UserName',
            'email.required' => 'Please insert E-mail',
            'password.required' => 'Please insert Password',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $request->input('name');
        $username = $request->input('username');
        $type = $request->input('type');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $country = $request->input('country');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $details = $request->input('details');
        $image = $request->input('image');
        $active = $request->input('active');

        $data = array(
            'name'=>$name,
            'username'=>$username,
            'type'=>$type,
            'email'=>$email,
            'password'=>$password,
            'country'=>$country,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'google'=>$google,
            'instagram'=>$instagram,
            'phone'=>$phone,
            'address'=>$address,
            'details'=>$details,
            'image'=>$image,
            'active'=>$active
            );

        $U = DB::table('users')->insert($data);
        if ($U){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function postActive(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active = 1;
            if($user->save()){
                return response()->json('success');
            }
        }
    }

    public function postDisActive(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active = 0;
            $user->save();
            return response()->json('success');
        }
    }

    public function postBlock(Request $request){
        if ($request->ajax()) {
            $user = User::find($request->id);
            $user->active =-1;
            $user->save();
            return response()->json('success');
        }
    }

    public function updateUser(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'active' => 'required',
        ] ,[
            'name.required' => 'Please insert Name',
            'username.required' => 'Please insert UserName',
            'email.required' => 'Please insert E-mail',
            'password.required' => 'Please insert Password',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name = $request->input('name');
        $username = $request->input('username');
        $type = $request->input('type');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $country = $request->input('country');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $details = $request->input('details');
        $image = $request->input('image');
        $active = $request->input('active');

        $data = array(
            'name'=>$name,
            'username'=>$username,
            'type'=>$type,
            'email'=>$email,
            'password'=>$password,
            'country'=>$country,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'google'=>$google,
            'instagram'=>$instagram,
            'phone'=>$phone,
            'address'=>$address,
            'details'=>$details,
            'image'=>$image,
            'active'=>$active
            );

        $U = DB::table('users')
            ->where('id','=', $id)
            ->update($data);

        if ($U){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];

    }

}
