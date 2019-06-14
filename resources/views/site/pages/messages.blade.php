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
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="item-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--<a href="{{route('markAllAsRead')}}" style="text-align: center; color: red; margin-left: 330px;" >Mark All As Read</a><hr>-->
                                            <table class="table">
                                                <thead>
                                                    <tr>    
                                                    <th style="width: 100px;">Name</th>
                                                    <th style="width: 150px;">E-mail</th>
                                                    <th style="width: 100px;">Phone</th>
                                                    <th style="width: 150px;">Address</th>
                                                    <th style="width: 300px;">Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($messages as $m)
                                                    <tr>
                                                        <td>{{$m->name}}</td>
                                                        <td>{{$m->email}}</td>
                                                        <td>{{$m->phone}}</td>
                                                        <td>{{$m->address}}</td>
                                                        <td>{{$m->message}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--end col-md-6-->
                                    </div>
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
                                    <li>
                                        <a href="{{route('site.profile')}}">
                                            <i class="fa fa-user"></i>
                                            Account Information
                                        </a>
                                    </li>
                                    @if(Auth::guard('members')->user()->type == 'owner')
                                    <li>
                                        <a href="{{ route('owner.items' , ['id' => Auth::guard('members')->user()->id]) }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                            My Items
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('product.add', ['id' => Auth::guard('members')->user()->id])}})}}">
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
                                    <li class="active">
                                        <a href="{{route('owner.messages', ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-envelope-o"></i>
                                            Messages
                                            <span style="float: right; margin-right: 20px;" class="wish-btn-count">{{$messagescount}}</span>
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