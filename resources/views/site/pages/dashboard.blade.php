@extends('site.layouts.master')
@section('content')
                <section class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-header-img.png')}}" alt="...">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <div class="page-header-info">
                            <h2 class="page-header-title">ملابس اطفال</h2>
                            <p>
                                {{$data->get('header_ar')}}
                            </p>
                        </div><!-- End Page-Header-Info -->
                        <div class="breadcramb">
                            <ol class="breadcrumb">
                              <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                              <li class="active">حسابي</li>
                            </ol>
                        </div>
                    </div>
                </section><!--End Page-Header--> 
                <div class="page-content">
                    <section class="section-sm">
                        <div class="container">
                            <div class="section-head">
                                <div class="account-info">
                                    <div class="account-img">
                                        @if(Auth::guard('members')->user()->avatar == null)
                                            <img class="btn-product-image" src="{{asset('assets/site/images/user-icon.png')}}">
                                        @else
                                            <img class="btn-product-image" src="{{asset('storage/uploads/members').'/'.Auth::guard('members')->user()->avatar}}">
                                        @endif
                                    </div><!-- End Account-Img -->
                                    <div class="account-name">
                                        <h3 class="title">{{Auth::guard('members')->user()->name}}</h3>
                                        <p>{{Auth::guard('members')->user()->email}}</p>
                                    </div><!-- End Account-Name -->
                                </div><!-- End Account-Info -->
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="dash-side-nav">
                                            <li class="active">
                                                <a href="{{route('site.dashboard')}}">
                                                    <i class="fa fa-tachometer"></i>
                                                    لوحة التحكم
                                                </a>
                                            </li> 
                                            <li>
                                                <a href="{{route('site.orders')}}">
                                                    <i class="fa fa-inbox"></i>
                                                    طلبات الشراء
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('site.wishlist' , ['id' => Auth::guard('members')->user()->id]) }}">
                                                    <i class="fa fa-heart"></i>
                                                    قائمة المفضلة
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('site.addresses')}}">
                                                    <i class="fa fa-map-signs"></i>
                                                    العناوين
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('site.profile')}}">
                                                    <i class="fa fa-list-alt"></i>
                                                     المعلومات الشخصية
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('site.logout')}}">
                                                    <i class="fa fa-power-off"></i>
                                                     تسجيل خروج
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- End col -->
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="black-item">
                                                    <div class="black-item-head">
                                                        <span>الطلبات</span>
                                                    </div><!-- End-Black-Item-Head -->
                                                    <div class="black-item-content">
                                                        <p>
                                                            لا يوجد طلبات مضافة
                                                            <a href="#">ابدأ التسوق الان</a>
                                                        </p>
                                                    </div><!-- End-Black-Item-Content -->
                                                </div><!-- End Black-Item -->
                                            </div><!-- End col -->
                                            <div class="col-md-6">
                                                <div class="black-item">
                                                    <div class="black-item-head">
                                                        <span>تفاصيل الحساب</span>
                                                    </div><!-- End-Black-Item-Head -->
                                                    <div class="black-item-content">
                                                        <div class="user-name">
                                                            <input class="form-control" value="محمد عادل دياب">
                                                            <a href="#">تعديل</a>
                                                        </div>
                                                        <div class="user-email">
                                                            <input class="form-control" value="mohammed.diab170@gmail.com">
                                                            <a href="#">تعديل</a>
                                                        </div>
                                                        <div class="user-passworb">
                                                            <a href="#">تعديل كلمة المرور</a>
                                                        </div>
                                                    </div><!-- End-Black-Item-Content -->
                                                </div><!-- End Black-Item -->
                                            </div><!-- End col -->
                                            <div class="col-md-6">
                                                <div class="black-item">
                                                    <div class="black-item-head">
                                                        <span>العناوين</span>
                                                    </div><!-- End-Black-Item-Head -->
                                                    <div class="black-item-content">
                                                        <h3 class="title">عنوان الشحن</h3>
                                                        <p>
                                                            شارع الملك سعود, الرياض, المملكة العربية السعودية
                                                            <a href="#">تعديل</a>
                                                        </p>
                                                    </div><!-- End-Black-Item-Content -->
                                                </div><!-- End Black-Item -->
                                            </div><!-- End col -->
                                        </div><!-- End row -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End Section-Content -->
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