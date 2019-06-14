@extends('site.layouts.master')
@section('title')
Login
@endsection
@section('content')
<!-- BEGIN LOGO -->
        <div class="logo">
                <img src="{{asset('assets/site/images/logo2.png')}}" alt="" />
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{ route('site.login') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
            {{ csrf_field() }}
                <h3 class="form-title font-green">Sign In</h3>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="email" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green addBTN">Login</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>

@endsection