@extends('site.layouts.master')
@section('content')            
                <section class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-header-img.png')}}" alt="...">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <div class="breadcramb">
                            <ol class="breadcrumb">
                              <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                              <li class="active">تسجيل الدخول</li>
                            </ol>
                        </div>
                    </div>
                </section><!--End Page-Header-->  
                <div class="page-content">
                    <section class="section-lg has-before-after sign-in">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                                    <div class="login-register">
                                        <div class="login-register-head">
                                            <h3 class="title title-md">تسجيل الدخول</h3>
                                        </div><!-- End Login-Register-Head -->
                                        <div class="login-register-body">
                                            <form class="" action="{{route('site.login')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="email">البريد الالكتروني</label>
                                                    <input id="email" type="email" name="username" class="form-control">
                                                </div><!-- End Form-Group -->
                                                <div class="form-group">
                                                    <label for="password">كلمة المرور</label>
                                                    <input id="password" name="password" type="password" class="form-control">
                                                </div><!-- End Form-Group -->
                                                <div class="form-group">
                                                    <div class="radio-check-item">
                                                        <input type="checkbox" class="form-control" id="remember">
                                                        <label for="remember">
                                                            تذكرنى
                                                        </label>
                                                    </div><!-- End Radio-Check-Item -->
                                                </div><!-- End Form-Group -->
                                                <div class="form-group">
                                                    <a href="{{route('site.forget')}}">
                                                        نسيت كلمة السر ؟
                                                    </a>
                                                </div><!-- End Form-Group -->
                                                <div class="form-group">
                                                    <button class="custom-btn addBTN">انضم الان</button>
                                                </div><!-- End Form-Group -->
                                            </form><!-- End Form -->
                                        </div><!-- End Login-Register-Body -->
                                        <div class="login-register-footer">
                                            <p>
                                                ليس لدى حساب
                                                <a href="{{route('site.register.get')}}">تسجيل مستخدم جديد</a>
                                            </p>
                                        </div><!-- End Login-Register-Body -->
                                    </div>
                                </div><!--End col-md-10-->
                            </div><!--End row-->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="subscribe text-center">
                        <div class="container colored">
                            <div class="row">
                                <div class="section-head">
                                    <h3 class="title title-md">
                                        اشتركي الان للحصول على اخر 
                                        <span>العروض والخصومات</span>
                                    </h3>
                                </div><!-- End Section-Head -->
                                <div class="section-content">
                                    <form class="subscribe-form" enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{URL::to('/subscribe')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="ادخل البريد الالكتروني" name="subscribe">
                                            <button class="subscribe-btn addBTN" type="submit">اشتركي الان</button>
                                        </div>
                                    </form><!-- End Form -->
                                </div><!-- End Section-Content -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!-- End Page-Content -->
@endsection