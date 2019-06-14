<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contacts;
use DB;

class ContactsController extends Controller {

	public function getContacts()
    {
        $contacts = DB::table('contacts')
            ->select('contacts.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.contact', compact('contacts','con'));
    }


    public function updateContacts(Request $request)
    {
        $v = validator($request->all() ,[
            'address_ar' => 'required',
            'address_en' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'google' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'whats' => 'required',
            'pin' => 'required',
            'linkedin' => 'required'
        ] ,[
            'address_ar.required' => 'Please insert Address in Arabic',
            'address_en.required' => 'Please insert Address in English',
            'email.required' => 'Please insert E-mail',
            'phone.required' => 'Please insert Phone',
            'facebook.required' => 'Please insert Facebook URL',
            'twitter.required' => 'Please insert Twitter URL',
            'google.required' => 'Please insert Google+ URL',
            'instagram.required' => 'Please insert Instagram URL',
            'youtube.required' => 'Please insert Youtube URL',
            'whats.required' => 'Please insert WhatsApp',
            'pin.required' => 'Please insert Pinterest URL',
            'linkedin.required' => 'Please insert Linkedin URL'
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $address_ar = $request->input('address_ar');
        $address_en = $request->input('address_en');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $google = $request->input('google');
        $instagram = $request->input('instagram');
        $youtube = $request->input('youtube');
        $whats = $request->input('whats');
        $pin = $request->input('pin');
        $linkedin = $request->input('linkedin');

        $data = array('address_ar' => $address_ar ,'address_en' => $address_en ,'email' => $email
            ,'phone' => $phone,'facebook' => $facebook,'twitter' => $twitter,'google' => $google
            ,'instagram' => $instagram,'youtube' => $youtube,'whats' => $whats,'pin' => $pin
            ,'linkedin' => $linkedin);

        $c = DB::table('contacts')->where('id', 1)->update($data);
        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated successfully'];
        }
        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }
}
