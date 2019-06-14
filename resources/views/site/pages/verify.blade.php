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
                              <li class="active">التأكيد</li>
                            </ol>
                        </div>
                    </div>
                </section><!--End Page-Header--> 
                <div class="page-content">
                    <section class="section-lg">
                        <div class="container">
                            <div class="item-box padding-30">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <h3 class="head-border" style="text-align: center;">قم بتأكيد بريدك الالكترونى</h3><br>
                                        <form action="{{route('phone.verify')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input name="code" class="form-control" placeholder="من فضلك أدخل كود التأكيد" type="text">
                                            </div><!--End col-md-6-->
                                            <button type="submit" class="custom-btn addBTN" style="margin-right: 200px;">تأكيد</button>
                                        </form>
                                    </div><!--End col-md-6-->
                                </div><!--End row-->
                            </div><!--End item-box-->
                        </div><!--End Container-->
                    </section>
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
                </div><!--End page-content-->
@endsection