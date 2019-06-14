<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use Hash;
use DB;

class MembersController extends Controller {


    public function getIndex() {
        $members = Member::get();

        return view('admin.pages.members.index', compact('members'));
    }

    public function getMember($id)
    {
        if (isset($id)) {
            $members = DB::table('members')
                    ->select('members.*')
                    ->where('id', '=', $id)
                    ->get();

            return view('admin.pages.members.edit', compact('members'));
        }
    }

    public function getM($id)
    {
        if (isset($id)) {
            $members = DB::table('members')
                        ->select('members.*')
                        ->where('id', '=', $id)
                        ->get();

            return view('admin.pages.members.delete', compact('members'));
        }
    }

    public function delete($id)
    {
        if (isset($id)) {
            DB::table('members')->where('id','=', $id)->delete();
            $members = Member::get();
            return view('admin.pages.members.index', compact('members'));
        }
    }

    public function getAdd() {

        return view('admin.pages.members.add');
    }

    public function insert(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'username' => 'required',
            'type' => 'required',
            'email' => 'required|email|unique:members,email',
            'password' => 'required|password|min:8',
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
            'avatar'=>$image,
            'active'=>$active
            );

        $U = DB::table('members')->insert($data);
        if ($U){
            return ['status' => 'succes' ,'data' => 'Data is inserted successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function postActive(Request $request){
        if ($request->ajax()) {
            $member = Member::find($request->id);
            $member->active = 1;
            if($member->save()){
                return response()->json('success');
            }
        }
    }

    public function postDisActive(Request $request){
        if ($request->ajax()) {
            $member = Member::find($request->id);
            $member->active = 0;
            $member->save();
            return response()->json('success');
        }
    }

    public function postBlock(Request $request){
        if ($request->ajax()) {
            $member = Member::find($request->id);
            $member->active =-1;
            $member->save();
            return response()->json('success');
        }
    }

    public function update(Request $request)
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
            'avatar'=>$image,
            'active'=>$active
            );

        $U = DB::table('members')
            ->where('id','=', $id)
            ->update($data);

        if ($U){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];

    }

}
