@extends('site.layouts.master')
@section('content')
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{URL::to('/')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            Wishlist
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="item-box no-border no-margin">
                                    <div class="row">
                                        @foreach($products as $p)
                                        <div class="col-md-4">
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
                                                </div><!--End cat-cont-->
                                            </div><!--cat item-->
                                        </div><!--End col-md-4-->
                                        @endforeach
                                    </div><!--End row-->
                                </div><!--End item-box-->
                            </div><!--End col-md-9-->
                            <div class="col-md-3">
                                <ul class="account-sidebar">
                                    <li class="account-img">
                                        @if(Auth::guard('members')->user()->avatar == null)
                                            <img class="btn-product-image" src="{{asset('assets/site/images/profile-img.png')}}">
                                        @else
                                            <img class="btn-product-image" src="{{asset('storage/uploads/members').'/'.Auth::guard('members')->user()->avatar}}">
                                        @endif
                                    </li><!--End account-img-->
                                    <li>
                                        <a href="{{route('site.profile')}}">
                                            <i class="fa fa-user"></i>
                                            Account Information
                                        </a>
                                    </li>
                                    @if(Auth::guard('members')->user()->type == 'owner')
                                    <li class="active">
                                        <a href="{{route('owner.items' , ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                            My Items
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('product.add', ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-plus"></i>
                                            Add Product
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.wishlist' , ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-heart"></i>
                                            My Wishlist
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('owner.messages', ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-envelope-o"></i>
                                            Messages
                                        </a>
                                    </li>
                                    @elseif(Auth::guard('members')->user()->type == 'member')
                                    <li>
                                        <a href="{{route('site.wishlist' , ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-heart"></i>
                                            My Wishlist
                                        </a>
                                    </li>
                                    @endif
                                </ul><!--End account-sidebar-->
                            </div><!--End Col-md-3-->
                        </div><!--End row-->
                    </div>                    
                    
                </div><!--End page-content-->  
@endsection