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
                              <li class="active">حقيبة التسوق</li>
                            </ol>
                        </div>
                    </div>
                </section><!--End Page-Header-->   
                <div class="page-content">
                    <section class="section-sm">
                        <div class="container">
                            <div class="toggle-container checkout-tabs" id="checkout">
                                @if (! Auth::guard('members')->check())
                                <div class="panel">
                                    <a href="#item-1" data-toggle="collapse" data-parent="#checkout">
                                        معلومات الحساب
                                    </a>
                                    <div class="panel-collapse collapse in" id="item-1">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="title title-md">تسجيل الدخول</h3>
                                                    <form class="login-form" action="{{route('site.login')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
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
                                                </div><!--End col-md-6-->
                                                <div class="col-md-6">
                                                    <h3 class="title title-md">انشاء حساب جديد</h3>
                                                    <form class="login-form" action="{{route('site.register')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label>الاسم</label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div><!-- End Form-Group -->
                                                    <div class="form-group">
                                                        <label>البريد الالكتروني</label>
                                                        <input type="email" class="form-control" name="email">
                                                    </div><!-- End Form-Group -->
                                                    <div class="form-group">
                                                        <label>كلمة المرور</label>
                                                        <input type="password" class="form-control" name="password1">
                                                    </div><!-- End Form-Group -->
                                                     <div class="form-group">
                                                        <label>تأكيد كلمة السر</label>
                                                        <input type="password" class="form-control" name="password2">
                                                    </div><!-- End Form-Group -->
                                                    <div class="form-group">
                                                        <div class="radio-check-item">
                                                            <input type="checkbox" class="form-control" id="remember">
                                                            <label for="remember"> تذكرنى
                                                        </label>
                                                        </div><!-- End Radio-Check-Item -->
                                                    </div><!-- End Form-Group -->
                                                    <div class="form-group">
                                                        <button class="custom-btn addButton" type="submit">انضم الان</button>
                                                    </div><!-- End Form-Group -->
                                                </form><!-- End Form -->
                                                </div><!--End col-md-6-->
                                            </div><!--End row-->
                                        </div><!-- end content -->
                                    </div><!--End panel-collapse-->
                                </div><!--End Panel-->
                                @endif
                                <!--<div class="panel">
                                    <a class="collapsed" href="#item-2" data-toggle="collapse" data-parent="#checkout">
                                        طريقة الدفع
                                    </a>
                                    <div class="panel-collapse collapse" id="item-2">
                                        <div class="panel-content">
                                            <form class="payment-form">
                                                <div class="form-group">
                                                    <div class="radio-check-item">
                                                        <input type="radio" class="form-control" id="credit-1" name="money">
                                                        <label for="credit-1">
															Paypal
														</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="radio-check-item">
                                                        <input type="radio" class="form-control" id="credit-2" name="money">
                                                        <label for="credit-2">
															Payfort
														</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-End Panel-->
                                <div class="panel">
                                    <a class="collapsed" href="#item-3" data-toggle="collapse" data-parent="#checkout">
                                        ملخص الطلب
                                    </a>
                                    <div class="panel-collapse collapse in" id="item-3">
                                        <div class="panel-content">
                                            <table class="table table-responsive checkout-table">
                                                <tbody>
                                                    @foreach($products as $p)
                                                    <tr>
                                                        <td class="product-img">
                                                            <img src="{{asset('storage/uploads/products').'/'.$p->image}}" alt="...">
                                                        </td>
                                                        <td class="product-name-amount">
                                                            <h3 class="title">{{$p->name_ar}}</h3>
                                                        </td>
                                                        <td class="product-num">
                                                            <h3 class="title">{{$p->stock}}</h3>
                                                        </td>
                                                        <td class="product-price">{{$p->sale_price}} ر.س</td>
                                                        <td class="product-total">
                                                            <h3 class="title">{{$p->sale_price * $p->stock}} ر.س</h3>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td>
                                                            <b> </b>
                                                        </td>
                                                        <td>
                                                            <b>المبلغ المطلوب شامل سعر الشحن :</b>
                                                        </td>
                                                        <td>
                                                            <b>{{$total + ($data->get('transfer') * $total)}} ر.س</b>
                                                        </td>
                                                        <td>
                                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                            <input type="hidden" name="cmd" value="_cart">
                                                            <input type="hidden" name="upload" value="1">
                                                            <input type="hidden" name="business" value="abdullah.nassar1000@gmail.com">
                                                            @foreach($products as $p)
                                                            <input type="hidden" name="item_name_{{$loop->index + 1}}" value="{{$p->name_ar}}">
                                                            <input type="hidden" name="quantity_{{$loop->index + 1}}" value="{{$p->stock}}">
                                                            <input type="hidden" name="amount_{{$loop->index + 1}}" value="{{$p->sale_price * $p->stock}}">
                                                            <input type="hidden" name="shipping_{{$loop->index + 1}}" value="{{$data->get('transfer') * $p->sale_price}}">
                                                            @endforeach
                                                            <input type="submit" value="ادفع" class="custom-btn">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><!-- End Table -->
                                        </div><!-- end content -->
                                    </div><!--End panel-collapse-->
                                </div><!--End Panel-->
                            </div><!--End toggle-container-->
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
