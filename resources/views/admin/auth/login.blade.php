@extends('admin.auth.master')
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
            <form class="login-form" action="{{ route('admin.login') }}" method="post">
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
                    <button type="submit" class="btn green uppercase">Login</button>
                </div>
                <div class="alert alert-success" style="display: none;" role="alert">
                    Now you're logged in
                </div>

                <div class="alert alert-danger" style="display: none;" role="alert">
                    Login Failed!
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        
        <div class="copyright"> 
            2017 &copy; MD Group Admin Panel By
            <a target="_blank" href="http://upureka.com">Upureka.co</a>

        </div>

@endsection