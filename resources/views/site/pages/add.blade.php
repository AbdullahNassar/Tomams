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
                            Add Product
                        </li>
                    </ul>
                </div><!--End Container-->
                <div class="page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="item-box no-border no-margin">
                                    <div class="row">
                                        <form action="{{route('product.add', ['id' => Auth::guard('members')->user()->id])}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="products" id="storage" >
                                                        <input type="hidden" name="image" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('assets/site/images/upload.png')}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="custom-btn" type="button" id="upload-btn">
                                                            Upload Image
                                                        </button>
                                                        <div class="progress" style="width: 100%; ">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%; background-color: #ED145B;">0%
                                                            </div>
                                                        </div><hr>
                                                        <h3 id="status" style="color: #ED145B; text-align: center; margin-left: 150px;"></h3>
                                                        <p id="loaded_n_total" style="color: #ED145B; margin-left: 150px;"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Name in Arabic :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="name_ar" class="form-control" placeholder="Product Name in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Name in English :</label>
                                                <div class="col-md-8">
                                                        <input type="text" name="name_en" class="form-control" placeholder="Product Name in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">On Sale :</label>
                                                <div class="col-md-8">
                                                    
                                                        <select class="form-control" name="on_sale">
                                                                <option>Select Status...</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Price :</label>
                                                <div class="col-md-8">
                                                    
                                                        <input type="number" name="price" class="form-control" placeholder="Product Price..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Sale Price :</label>
                                                <div class="col-md-8">
                                                    
                                                        <input type="number" name="sale_price" class="form-control" placeholder="Product Sale Price..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Description in Arabic :</label>
                                                <div class="col-md-8">
                                                    
                                                        <textarea rows="10" name="content_ar" class="form-control" placeholder="Product Description in Arabic..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Description in English :</label>
                                                <div class="col-md-8">
                                                    
                                                        <textarea rows="10" name="content_en" class="form-control" placeholder="Product Description in English..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Quantity :</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="quantity" class="form-control" placeholder="Product Quantity..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Category :</label>
                                                <div class="col-md-8">
                                                        <select class="form-control" name="cat_id" required>
                                                                <option>Select Category...</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->cat_id}}">{{$category->cat_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4" style="text-align: left;">Product Sub Category :</label>
                                                <div class="col-md-8">
                                                        <select class="form-control" name="sub_id" required>
                                                                <option>Select Sub Category...</option>
                                                                @foreach($subs as $sub)
                                                                <option value="{{$sub->sub_id}}">{{$sub->sub_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-2" style="margin-left: 350px;">
                                                    <button type="submit" class="custom-btn addBTN">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                    <li>
                                        <a href="{{route('owner.items' , ['id' => Auth::guard('members')->user()->id])}}">
                                            <i class="fa fa-pencil-square-o"></i>
                                            My Items
                                        </a>
                                    </li>
                                    <li class="active">
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