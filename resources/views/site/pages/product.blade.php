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
                @foreach($product as $p)
                <div class="page-content">
                    <section class="section-sm single-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-show-wrapper">
                                        <div class="general-img">
                                            <img id="show-product" src="{{asset('storage/uploads/products').'/'.$p->image}}" data-zoom-image="{{asset('storage/uploads/products').'/'.$p->image}}">  
                                        </div><!--general-img-->
                                        <div class="thumblist-box">
                                            <a href="#" class="btn prev">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>
                                            <a href="#" class="btn next">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                            <div id="show-product-gal"> 
                                                @foreach($g_images as $g)
                                                <a href="#" data-image="{{asset($g->image)}}" data-zoom-image="{{asset($g->image)}}">
                                                    <img alt="" src="{{asset($g->image)}}">
                                                </a>
                                                @endforeach
                                            </div><!--End show-product-gal-->
                                        </div><!--End thumblist-box-->
                                    </div><!--image Wrapper-->
                                </div><!-- End col -->
                                <div class="col-md-6">
                                    <div class="product-detail">
                                        <div class="product-detail-head">
                                            <div class="rate-widget">
                                                <div class="rateit" data-rateit-mode="font" data-rateit-icon="" style="font-family:fontawesome"></div>
                                                <span>3 اراء </span>
                                            </div><!-- End Rate-Widget -->
                                            <h3 class="title title-md">
                                                {{$p->name_ar}}
                                            </h3>
                                            <div class="price">
                                                <span>{{$p->sale_price}} ر.س </span>
                                                <span class="old-price"> ر.س {{$p->price}}</span>
                                            </div><!-- End Price -->
                                        </div><!-- End Product-Detail-Head -->
                                        <div class="product-detail-content">
                                            <div class="visibility">
                                                <span>الاتاحة:</span>
                                                <span> متوفر {{$p->quantity}} قطعة</span>
                                            </div><!-- End Visibility -->
                                            <p>
                                                {{$p->head_ar}}
                                                <a href="#description">المزيد+</a>
                                            </p>
                                            <form action="{{ route('cart.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="product_id" value="{{$p->p_id}}">
                                                @if (Auth::guard('members')->check())
                                                <input type="hidden" name="member_id" value="{{Auth::guard('members')->user()->id}}">
                                                @endif
                                                <div class="form-group color">
                                                    <label>اللون :</label>
                                                    <div class="radio-check-item">
                                                        <input type="radio" name="color" class="form-control" id="red" value="red">
                                                        <label for="red" class="red-color"></label>
                                                    </div><!-- End Radio-Check-Item -->
                                                    <div class="radio-check-item">
                                                        <input type="radio" name="color" class="form-control" id="blue" value="blue">
                                                        <label for="blue" class="blue-color"></label>
                                                    </div><!-- End Radio-Check-Item -->
                                                    <div class="radio-check-item">
                                                        <input type="radio" name="color" class="form-control" id="green" value="green">
                                                        <label for="green" class="green-color"></label>
                                                    </div><!-- End Radio-Check-Item -->
                                                    <div class="radio-check-item">
                                                        <input type="radio" name="color" class="form-control" id="yellow" value="yellow">
                                                        <label for="yellow" class="yellow-color"></label>
                                                    </div><!-- End Radio-Check-Item -->
                                                    <div class="radio-check-item">
                                                        <input type="radio" name="color" class="form-control" id="magenta" value="magenta">
                                                        <label for="magenta" class="magenta-color"></label>
                                                    </div><!-- End Radio-Check-Item -->
                                                </div><!-- End form-Group -->
                                                <div class="form-group amount">
                                                    <label>الكمية :</label>
                                                    <div class="product-counter">
                                                        <a href="#" class="number-down">
                                                            <i class="fa fa-minus"></i>
                                                        </a>
                                                        <input value="1" class="form-control" type="text" name="quantity">
                                                        <a href="#" class="number-up">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div><!--End cart-number-->
                                                </div><!-- End Form-Group -->
                                                <div class="form-group option">
                                                    <button type="submit" class="icon-btn text-btn add-to-cart addBTN">
                                                        <i class="fa fa-shopping-basket"></i>
                                                        <span>تسوق الان</span>
                                                    </button>
                                            </form>
                                                    <form action="{{ route('wishlist.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="product_id" value="{{$p->p_id}}">
                                                        <button type="submit" class="icon-btn wishlist addBTN">
                                                            <i class="fa fa-heart"></i>
                                                            <span></span>
                                                        </button>
                                                    </form>
                                                </div><!-- End form-Group -->
                                        </div><!-- End Product-Detail-Content -->
                                        <div class="product-detail-share">
                                            <p>
                                                <i class="fa fa-share-alt"></i>
                                                :
                                            </p>
                                            <ul class="social-list">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                            </ul><!-- End Social-List -->
                                        </div>
                                    </div><!-- End Product-Detail -->
                                </div><!-- End col -->
                            </div><!-- End row -->                            
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md product-info">
                        <div class="container">
                            <div class="section-head text-center">
                                <div class="section-title tab-head">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#description" aria-controls="description" role="tab" data-toggle="tab">
                                                تفاصيل المنتج
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#Specifications" aria-controls="Specifications" role="tab" data-toggle="tab">
                                                المواصفات
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">
                                                التقيمات
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- End Tab-Head -->
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                                        <p>
                                            {{$p->content_ar}}
                                        </p>
                                        <div class="product-feature">
                                            <h3 class="title">المميزات:</h3>
                                            <ul class="feature-list">
                                                @php
                                                $features = json_decode($p->features);
                                                @endphp
                                                @foreach((array)$features as $f)
                                                <li>{{$f}}</li>
                                                @endforeach
                                            </ul><!-- End Feature-List -->
                                        </div><!-- End Product-Feature -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Specifications">
                                        <ul class="sepecefications">
                                            @foreach($specifications as $sp)
                                            <li>
                                                <span>{{$sp->specification}}</span>
                                                <span>{{$sp->description}}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="reviews">   
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="comments">
                                                    @foreach($reviews as $r)
                                                    <div class="comment-item">
                                                        <div class="comment-item-head">
                                                            <img src="{{asset('assets/site/images/person.png')}}" alt="...">
                                                            <div class="auther-info">
                                                                <span class="date">{{$r->created_at}}</span>
                                                                <h3 class="title">{{$r->name}}</h3>
                                                            </div><!-- End Auther-Info -->
                                                        </div><!-- End Comment-Item-Head -->
                                                        <div class="comment-item-content">
                                                            <ul class="rate-list">
                                                                @for ($i = 1; $i <= $r->quality; $i++)
                                                                    <li class="active">
                                                                        <i class="fa fa-star"></i>
                                                                    </li>
                                                                @endfor
                                                            </ul><!-- End Rate-List -->
                                                            <p>
                                                                {{$r->review}}
                                                            </p>

                                                        </div><!-- End Comment-Item-Content -->
                                                    </div><!-- End Comment-Item -->
                                                    @endforeach
                                                </div><!-- End Comments -->
                                            </div><!-- End col -->
                                            <div class="col-md-3"></div><!-- End col -->
                                            <div class="col-md-9">
                                    <div class="write-comment">
                                        <div class="write-comment-head">
                                            <h3 class="title">أضيفي تعليق</h3>
                                            <div class="rateit" data-rateit-mode="font" data-rateit-icon="" style="font-family:fontawesome"></div>
                                        </div><!-- End Blog-Comments-Head -->
                                        <div class="write-comment-content">
                                            <form class="form" action="{{ route('product.review') }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="{{$p->p_id}}">
                                                            <input type="hidden" name="date" value="{{date('Y-m-d')}}">
                                                            <input type="text" class="form-control" placeholder="الاسم" name="name">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="7" placeholder="اكتبي تعليق" name="review"></textarea>
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <button type="submit" class="custom-btn addBTN">أضيفي تعليق</button>
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                </div><!-- End row -->
                                            </form><!-- End form -->
                                            </div><!-- End Write-Comment-Content -->
                                    </div>
                                </div><!-- End col -->
                                        </div><!-- End row -->
                                    </div>
                                </div><!-- End Tab-Content -->
                            </div><!-- End Section-Content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-sm text-center all-product">
                        <div class="container">
                            <div class="section-head">
                                <h3 class="section-title">منتجات اخرى</h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div id="products" class="products-wrapper">
                                    <div class="row">
                                        @foreach($top_rated_products as $pr)
                                        @if($loop->index < 4)
                                        <div class="col-md-3 col-sm-6">
                                            <div class="product-item style-2">
                                                <div class="product-item-img">
                                                    <img src="{{asset('storage/uploads/products').'/'.$pr->image}}" alt="...">
                                                </div><!-- End Product-Item-Img -->
                                                <div class="product-item-body">
                                                    <a href="#" class="title">
                                                        {{$pr->name_ar}}
                                                    </a>
                                                    <div class="price">
                                                        <span>{{$pr->sale_price}} ر.س </span>
                                                    <span class="old-price"> ر.س {{$pr->price}}</span>
                                                    </div>
                                                </div><!-- End Product-Item-Body -->
                                                <div class="product-item-option">
                                                    <form action="{{ route('wishlist.add' , ['id' => $pr->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="icon-btn wishlist addBTN">
                                                            <i class="fa fa-heart"></i>
                                                            <span></span>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('site.product' , ['id' => $pr->p_id]) }}" class="icon-btn text-btn view">
                                                        <i class="fa fa-eye"></i>
                                                        <span>مشاهدة</span>
                                                    </a>
                                                    <form action="{{ route('cart.add' , ['id' => $pr->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="icon-btn text-btn add-to-cart addBTN">
                                                        <i class="fa fa-shopping-basket"></i>
                                                        <span>تسوق الان</span>
                                                    </button>
                                                </form>
                                                </div>
                                            </div><!-- End Product-Item -->
                                        </div><!-- End col -->
                                        @endif
                                        @endforeach
                                    </div><!--End Row-->
                                </div><!--End projects-wrapper-->
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
@endforeach
@endsection