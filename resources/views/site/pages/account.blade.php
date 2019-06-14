@extends('site.layouts.master')
@section('content')
            <div class="main main-bg" role="main">
                <div class="container page-heading">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                        </li>
                        <li>
                            Account Information 
                        </li>
                    </ul>
                </div><!--End Container-->
                <form action="{{route('profile.image')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="item-box">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Name</label>
                                                <input name="name" class="form-control" type="text" placeholder="enter your name" value="{{Auth::guard('members')->user()->name}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>UserName</label>
                                                <input name="username" class="form-control" type="text" placeholder="enter your UserName" value="{{Auth::guard('members')->user()->username}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input name="phone" class="form-control" type="text" placeholder="enter your Phone" value="{{Auth::guard('members')->user()->phone}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My Email</label>
                                                <input name="email" class="form-control" type="email" placeholder="enter your Email" value="{{Auth::guard('members')->user()->email}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My Country</label>
                                                <input name="country" class="form-control" type="text" placeholder="enter your Country" value="{{Auth::guard('members')->user()->country}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My facebook</label>
                                                <input name="facebook" class="form-control" type="text" placeholder="enter your facebook" value="{{Auth::guard('members')->user()->facebook}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My twitter</label>
                                                <input name="twitter" class="form-control" type="text" placeholder="enter your twitter" value="{{Auth::guard('members')->user()->twitter}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My google plus</label>
                                                <input name="google" class="form-control" type="text" placeholder="enter your google plus" value="{{Auth::guard('members')->user()->google}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My Instagram</label>
                                                <input name="instagram" class="form-control" type="text" placeholder="enter your instagram" value="{{Auth::guard('members')->user()->instagram}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label>My Address</label>
                                                <input name="address" class="form-control" type="text" placeholder="enter your address" value="{{Auth::guard('members')->user()->address}}">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-12 form-group quality">
                                                <label>My information</label>
                                                <textarea name="details" class="form-control" type="text" placeholder="enter your information" rows="6">{{Auth::guard('members')->user()->details}}</textarea>
                                            </div><!--End col-md-12--> 
                                        </div><!--End row-->
                                        <button type="submit" class="custom-btn addBTN">Edit Information</button>
                                    
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
                                        <input type="file" name="image_name" style="display: none;">
                                    </li><!--End account-img-->
                                    <li class="active">
                                        <a href="{{route('site.profile')}}">
                                            <i class="fa fa-user"></i>
                                            Account Information
                                        </a>
                                    </li>
                                    @if(Auth::guard('members')->user()->type == 'owner')
                                    <li>
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
                                        <a href="{{ route('site.wishlist' , ['id' => Auth::guard('members')->user()->id]) }}">
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
                </form>
@endsection