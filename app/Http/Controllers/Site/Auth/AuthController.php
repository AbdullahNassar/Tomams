<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\Register;
use DB;
use App\Categorie;
use App\Data;
use App\Contact;
use App\Sub;

class AuthController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('guest.site', ['except' => ['logout', 'getLogout']]);
        parent::__construct($request);
    }
    
    public function getLogin() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.login', compact('categories','subs','data','contact'));
    }

    public function getRegister() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.register', compact('categories','subs','data','contact'));
    }

    public function postLogin(Request $r) {
        $v = validator($r->all() ,[
            'username' => 'required|email',
            'password' => 'required',
        ] ,[
            'username.required' => 'من فضلك أدخل البريد الالكترونى',
            'password.required' => 'من فضلك أدخل كلمة السر',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $r->input('username');
        $password = $r->input('password');
        
        $member = Member::where('active', 1)->where('email', $name)->orWhere('username', $name)->first();

        if ($member && Hash::check($password, $member->password)) {
            Auth::guard('members')->login($member, $r->has('remember'));
            return ['status' => 'succes' ,'data' => 'تم تسجيل الدخول بنجاح'];
        }else{
            return ['status' => false ,'data' => 'يرجى التأكد من البيانات المدخلة ثم أعد المحاولة'];
        }
    }

    /**
     * Logout The user
     */
    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('site.home');
    }

    public function register(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'email' => 'required|email|unique:members',
            'password1' => 'required',
            'password2' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل الاسم',
            'name.min' => 'من فضلك أدخل على الأقل 6 أحرف',
            'email.unique' => 'من فضلك أدخل بريد الالكترونى آخر',
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
            'password1.required' => 'من فضلك أدخل كلمة السر',
            'password2.required' => 'من فضلك قم بالتأكيد على كلمة السر',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $p1 = $request->input('password1');
        $p2 = $request->input('password2');

        if ($p1 == $p2) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = bcrypt($request->input('password1'));

            $member = new Member();
            $member->name = $name;
            $member->email = $email;
            $member->username = $email;
            $member->password = $password;
            $member->recover = $p1;
            $member->active = 0;
            $member->password = $password;
            $code = str_random(5);
            $member->code = $code;

            if ($member->save()){
                Mail::to($email)->send(new Register($code));
                return ['status' => 'succes' ,'data' => 'تم ارسال كود التأكيد الى بريدك الالكترونى'];
            }else{
                return ['status' => false ,'data' => 'يرجى التأكد من البيانات المدخلة ثم أعد المحاولة'];
            }
            return ['status' => false ,'data' => 'يرجى التأكد من البيانات المدخلة ثم أعد المحاولة'];
        }

        return ['status' => false ,'data' => 'يرجى التأكد من تطابق كلمة السر'];
    }
    
    public function phone() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.verify', compact('categories','subs','data','contact'));
    }
    
    public function error() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.error', compact('categories','subs','data','contact'));
    }

    public function forget() {

        $categories = Categorie::all();
        $subs = Sub::all();

        $data = new Data;
        $contact = new Contact;

        return view('site.pages.forget', compact('categories','subs','data','contact'));
    }

    public function verify(Request $request){

        $v = validator($request->all() ,[
            'code' => 'required',
        ] ,[
            'code.required' => 'من فضلك أدخل كود التأكيد',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        
        $code = $request->input('code');
        $member = DB::table('members')->select('members.code')->where('members.code' , '=' , $code)->get();
        if ($member) {
            $mem = Member::where('code', $code)->first();
            if($mem){
                $mem->active = 1;
                Auth::guard('members')->login($mem, $request->has('remember'));
                return ['status' => 'succes' ,'data' => 'تم تسجيل الدخول بنجاح'];
            }else{
                return ['status' => false ,'data' => 'لم يتم التعرف على الكود , يرجى اعادة المحاولة'];
            }
        }else{
            return ['status' => false ,'data' => 'لم يتم التعرف على الكود , يرجى اعادة المحاولة'];
        }
    }


    public function password(Request $r) {

        $v = validator($r->all() ,[
            'email' => 'required|email',
        ] ,[
            'email.required' => 'من فضلك أدخل البريد الالكترونى',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $email = $r->input('email');

        $site = Member::where('email', $email)->first();

        if ($site) {

            $name = $site->name;

            $password = $site->recover;

            Mail::to($email)->send(new SendMail($password));

            return ['status' => 'succes' ,'data' => 'تم ارسال كلمة السر الى بريدك الالكترونى'];
        }
        return ['status' => false ,'data' => 'يرجى التأكد من البيانات المدخلة ثم أعد المحاولة'];
    }

}
