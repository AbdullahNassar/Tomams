@extends('site.layouts.master')
@section('content')            
                <section class="home-slider">
                    <div class="slider">
                        @foreach($sliders as $slider)
                        <div class="slider-item @if($loop->index==0) active @endif">
                            <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}">
                        </div>
                        @endforeach
                    </div>
                </section><!--End home-slider-->  
                <div class="page-content">
                    <div class="section-sm has-before-after category-section">
                        <div class="container">
                            <div class="row">
                                @foreach($categories as $cat)
                                @if($loop->index < 3)
                                <div class="col-md-4">
                                    <div class="cat-widget">
                                        <div class="cat-widget-head">
                                            <img src="{{asset('storage/uploads/categories').'/'.$cat->icon}}" alt="...">
                                        </div><!-- End Widget-Head -->
                                        <div class="cat-widget-content">
                                            <a class="title title-md" href="{{ route('site.category' , ['id' => $cat->cat_id]) }}">{{$cat->cat_name_ar}}</a>
                                        </div><!-- End Widget-Content -->
                                    </div><!-- End Widget -->
                                </div><!-- End col -->
                                @endif
                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </div><!-- End Section -->
                    <section class="section-sm has-before-after no-before">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title">احدث المنتجات</h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-md-3">
                                        @foreach($latest_products as $pro)
                                        @if($loop->index<=1)
                                        <div class="product-item style-1">
                                            <div class="product-item-img">
                                                <img src="{{asset('storage/uploads/products').'/'.$pro->image}}" alt="...">
                                            </div><!-- End Product-Item-Img -->
                                            <div class="product-item-body">
                                                <a href="{{ route('site.product' , ['id' => $pro->p_id]) }}" class="title">
                                                    {{$pro->name_ar}}  
                                                </a>
                                            </div><!-- End Product-Item-Body -->
                                            <div class="product-item-option">
                                                <a href="{{ route('site.product' , ['id' => $pro->p_id]) }}" class="icon-btn text-btn add-to-cart">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <span>تسوق الان</span>
                                                </a>
                                            </div>
                                        </div><!-- End Product-Item -->
                                        @endif
                                        @endforeach
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        @foreach($latest1_products as $pr)
                                        <div class="product-item lg-item style-1">
                                            <div class="product-item-img">
                                                <img src="{{asset('storage/uploads/products').'/'.$pr->image}}" alt="...">
                                            </div><!-- End Product-Item-Img -->
                                            <div class="product-item-body">
                                                <a href="{{ route('site.product' , ['id' => $pr->p_id]) }}" class="title">
                                                    {{$pr->name_ar}}  
                                                </a>
                                            </div><!-- End Product-Item-Body -->
                                            <div class="product-item-option">
                                                <a href="{{ route('site.product' , ['id' => $pr->p_id]) }}" class="icon-btn text-btn add-to-cart">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <span>تسوق الان</span>
                                                </a>
                                            </div>
                                        </div><!-- End Product-Item -->
                                        @endforeach
                                    </div><!-- End col -->
                                    <div class="col-md-3">
                                        @foreach($latest2_products as $p)
                                        <div class="product-item style-1">
                                            <div class="product-item-img">
                                                <img src="{{asset('storage/uploads/products').'/'.$p->image}}" alt="...">
                                            </div><!-- End Product-Item-Img -->
                                            <div class="product-item-body">
                                                <a href="{{ route('site.product' , ['id' => $p->p_id]) }}" class="title">
                                                    {{$p->name_ar}}  
                                                </a>
                                            </div><!-- End Product-Item-Body -->
                                            <div class="product-item-option">
                                                <a href="{{ route('site.product' , ['id' => $p->p_id]) }}" class="icon-btn text-btn add-to-cart">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <span>تسوق الان</span>
                                                </a>
                                            </div>
                                        </div><!-- End Product-Item -->
                                        @endforeach
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End Section-Content -->
                        </div><!-- End Container -->
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