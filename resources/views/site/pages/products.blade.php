@extends('site.layouts.master')
@section('content')            
                <section class="page-header page-header-lg">
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
                              <li class="active">ملابس الاطفال</li>
                            </ol>
                        </div>
                    </div>
                </section><!--End Page-Header-->  
                <div class="page-content">
                    <section class="has-before-after category-page">
                        <div class="search-box">
                            <div class="search-box-head">
                                <div class="container">
                                    <div class="search-toggle">
                                        <button class="filter-btn" data-toggle="collapse" data-target="#filter-box" aria-expanded="false" aria-controls="filter-box">
                                            <img src="{{asset('assets/site/images/icon.png')}}" alt="..">
                                            تصفية النتائج
                                        </button>
                                    </div><!-- End Search-Toggle -->
                                    <div class="search-sort">
                                        <label>ترتيب حسب:</label>
                                        <select class="form-control">
                                            <option>الاعلى سعر</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div><!-- End Search-Sort -->
                                </div><!-- End container -->
                            </div><!-- End Search-Box-Head -->
                            <div class="search-box-content">
                                <div class="container">
                                    <div class="collapse" id="filter-box">
                                        <div class="row">
                                            <form class="" method="GET" action="{{route('product.search')}}">
                                                {{ csrf_field() }}
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>الجنس</label>
                                                        <select class="form-control">
                                                            <option>جميع الملابس</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>اللون</label>
                                                        <select class="form-control">
                                                            <option>كل الالوان</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>العمر</label>
                                                        <select class="form-control">
                                                            <option>جميع الاعمار</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>السعر</label>
                                                        <select class="form-control">
                                                            <option>جميع الاسعار</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>المقاس</label>
                                                        <select class="form-control">
                                                            <option>كل المقاسات</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>العلامة</label>
                                                        <select class="form-control">
                                                            <option>كل العلامات</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="custom-btn">بحث</button>
                                                    </div><!-- End Form-Group -->
                                                </div>
                                            </form><!-- End form -->
                                        </div><!-- End row -->
                                    </div><!--End Collapse-->
                                </div><!-- End container -->
                            </div><!-- End Search-Box-Content -->
                        </div><!-- End Search-Box -->  
                        <div class="container">
                            <div class="products-wrapper">
                                <div class="row">
                                    @foreach($s_products as $p)
                                    <div class="col-md-3 col-sm-6 item-1">
                                        <div class="product-item style-2">
                                            <div class="product-item-img">
                                                <img src="{{asset('storage/uploads/products').'/'.$p->image}}" alt="...">
                                            </div><!-- End Product-Item-Img -->
                                            <div class="product-item-body">
                                                <a href="{{ route('site.product' , ['id' => $p->p_id]) }}" class="title">
                                                    {{$p->name_ar}}
                                                </a>
                                                <div class="price">
                                                    <span>{{$p->sale_price}} ر.س </span>
                                                    <span class="old-price"> ر.س {{$p->price}}</span>
                                                </div>
                                            </div><!-- End Product-Item-Body -->
                                            <div class="product-item-option">
                                                <form action="{{ route('wishlist.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="product_id" value="{{$p->p_id}}">
                                                    <button type="submit" class="icon-btn wishlist addBTN">
                                                        <i class="fa fa-heart"></i>
                                                        <span></span>
                                                    </button>
                                                </form>
                                                <a href="{{ route('site.product' , ['id' => $p->p_id]) }}" class="icon-btn text-btn view">
                                                    <i class="fa fa-eye"></i>
                                                    <span>مشاهدة</span>
                                                </a>
                                                <form action="{{ route('cart.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="product_id" value="{{$p->p_id}}">
                                                    <input type="hidden" name="member_id" value="{{Auth::guard('members')->user()->id}}">
                                                    <button type="submit" class="icon-btn text-btn add-to-cart addBTN">
                                                        <i class="fa fa-shopping-basket"></i>
                                                        <span>تسوق الان</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div><!-- End Product-Item -->
                                    </div><!-- End col -->
                                    @endforeach
                                </div><!--End Row-->
                            </div><!--End projects-wrapper-->
                        </div><!--End container -->
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