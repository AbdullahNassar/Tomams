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
                    <section class="section-sm has-before-after cart">
                        <div class="container">
                            <div class="section-head">
                                <h3 class="section-title">
                                    حقيبة التسوق
                                    <span>( {{$cart}} منتجات )</span>
                                </h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-responsive">
                                            <tbody>
                                                @foreach($products as $p)
                                                <tr>
                                                    <td class="product-img">
                                                        <img src="{{asset('storage/uploads/products').'/'.$p->image}}" alt="...">
                                                    </td>
                                                    <td class="product-name-amount">
                                                        <h3 class="title">{{$p->name_ar}}</h3>
                                                        <form action="{{ route('cart.edit' , ['id' => $p->product_id]) }}" method="post">
                                                            {{ csrf_field() }}
                                                        <div class="product-counter">
                                                            <a href="#" class="number-down">
                                                                <i class="fa fa-minus"></i>
                                                            </a>
                                                            <input value="{{$p->stock}}" class="form-control" type="text" name="quantity">
                                                            <a href="#" class="number-up">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div><!-- End Product-Counter -->
                                                    </td>
                                                    <td class="product-price">{{$p->sale_price * $p->stock}} ر.س</td>
                                                    <td class="product-remove">
                                                        <button type="button" class="btn-remove btndelet" data-url="{{ route('cart.delete' , ['id' => $p->c_id]) }}">
                                                            <span aria-hidden="true">حذف</span>
                                                        </button>   

                                                        <button type="submit" class="btn-edit">
                                                            <span aria-hidden="true">تعديل</span>
                                                        </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table><!-- End Table -->
                                    </div><!-- End col -->
                                    <div class="col-lg-3 col-lg-offset-1
                                                col-md-4 col-md-offset-0">
                                        <div class="total-widget" id="total-widget" data-spy="affix">
                                            <form action="{{ route('order.add' , ['id' => Auth::guard('members')->user()->id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="total" value="{{$total + ($data->get('transfer') * $total)}}">
                                                <input type="hidden" name="date" value="{{date('Y-m-d')}}">
                                                <div class="total-widget-head">
                                                    <h3 class="title">اجمالي المشتريات</h3>
                                                </div><!-- Total-Widget-Head -->
                                                <div class="total-widget-content">
                                                    <div class="total-price">
                                                        <p>
                                                            <span>اجمالي السعر:</span>
                                                            <span>{{$total}} ر.س</span>
                                                        </p>
                                                        <p>
                                                            <span>سعر الشحن:</span>
                                                            <span>{{$data->get('transfer') * $total}} ر.س</span>
                                                        </p>
                                                    </div><!-- End Total-Widget-Price -->
                                                    <div class="total-price grand-total">
                                                        <p>
                                                            <span>المبلغ المطلوب:</span>
                                                            <span>{{$total + ($data->get('transfer') * $total)}} ر.س</span>
                                                        </p>
                                                    </div><!-- End Grand-Total -->
                                                </div><!-- End Total-Content -->
                                                <div class="total-widget-footer">
                                                    <button type="submit" class="custom-btn BTN">متابعة للدفع</button>
                                                </div><!-- End Total-Widget-Footer -->
                                            </form>
                                        </div><!-- End Total -->
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