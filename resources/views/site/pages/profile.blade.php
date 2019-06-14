@extends('site.layouts.master')
@section('content')
@foreach($owner as $o)
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.home')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>Owner Public Account</li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container"> 
                        <div class="item-box">
                            <div class="public-profile">
                                <div class="account-img">
                                    @if($o->avatar)
                                            <img class="btn-product-image" src="{{asset('assets/site/images/profile-img.png')}}">
                                        @else
                                            <img class="btn-product-image" src="{{asset('storage/uploads/members').'/'.$o->avatar}}">
                                        @endif
                                </div><!--End account-img-->
                                <h3 class="public-profile-name">
                                    {{$o->name}}
                                </h3><!--End public-profile-name-->
                            </div><!--End public-profile-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#my-info" data-toggle="tab">
                                        My Information
                                    </a>
                                </li>
                                <li>
                                    <a href="#contact-awner" data-toggle="tab">
                                        Contact Me
                                    </a>
                                </li>
                                <li>
                                    <a href="#awner-item" data-toggle="tab">
                                    My Items
                                    </a>
                                </li>
                            </ul><!--End nav-tabs-->
                        </div><!--End item-box-->
                            
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="my-info">
                                <div class="account-info">
                                    <h3 class="head-border">
                                        Personal Information
                                    </h3>
                                    <p class="section-txt">{{$o->details}}</p>
                                    <ul class="social-list">
                                        <li>
                                            <a href="{{$o->google}}">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$o->twitter}}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$o->facebook}}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>                
                                </div><!--End account-info-->
                            </div><!--End tab-pane-->
                            <div class="tab-pane fade" id="contact-awner">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h3 class="head-border">Contact Me</h3>
                                        <div class="spacer-15"></div>
                                        <form action="{{route('owner.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Your Name</label>
                                                    <input name="member_id" class="form-control" value="{{$o->id}}" type="hidden">
                                                    <input name="name" class="form-control" placeholder="enter your name" type="text">
                                                </div><!--End col-md-6-->
                                                <div class="col-md-6 form-group">
                                                    <label>Your Email</label>
                                                    <input name="email" class="form-control" placeholder="enter your Email" type="email">
                                                </div><!--End col-md-6-->
                                                <div class="col-md-6 form-group">
                                                    <label>Your Mobile</label>
                                                    <input name="phone" class="form-control" placeholder="enter Your mobile" type="text">
                                                </div><!--End col-md-6-->
                                                <div class="col-md-6 form-group">
                                                    <label>Your Address</label>
                                                    <input name="address" class="form-control" placeholder="enter Your address" type="text">
                                                </div><!--End col-md-6-->
                                                <div class="col-md-12 form-group">
                                                    <label>Message</label>
                                                    <textarea name="message" class="form-control" type="text" placeholder="enter your message" rows="6"></textarea>  
                                                </div>     
                                            </div><!--End row-->
                                            <button type="submit" class="custom-btn addBTN">Contact Owner</button>
                                        </form>
                                    </div><!--End col-md-8-->
                                </div><!--End row-->
                            </div><!--End tab-pane-->
                            <div class="tab-pane fade" id="awner-item">
                                <div class="row">
                                    @foreach($products as $p)
                                    <div class="col-md-3">
                                        <div class="cat-item">
                                            <a class="cat-img" href="{{ route('site.product' , ['id' => $p->p_id]) }}">
                                                <img src="{{asset('storage/uploads/products').'/'.$p->image}}">
                                            </a><!--End cat-img-->
                                            <div class="cat-cont">
                                                <div class="cat-front">
                                                    <h2>
                                                        {{$p->name_en}}
                                                    </h2>
                                                    <ul class="rating">
                                                        @for ($i = 1; $i <= $p->rate; $i++)
                                                            <li class="active"></li>
                                                        @endfor
                                                    </ul>
                                                    <div class="price">
                                                        ${{$p->price}}
                                                    </div>
                                                </div><!--End cat front-->
                                                <div class="cat-back">
                                                    <form action="{{ route('wishlist.add' , ['id' => $p->p_id]) }}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="custom-btn addBTN">
                                                            Add To Wishlist
                                                        </button>
                                                    </form>
                                                </div><!--End cat back-->
                                            </div><!--End cat-cont-->
                                        </div><!--cat item-->
                                    </div><!--End col-md-3-->
                                    @endforeach
                                </div><!--End row-->
                            </div><!--End tab-pane-->
                        </div><!--End tab-content-->
                    </div><!--End container-->                    
                </div><!--End page-content-->
@endforeach
@endsection