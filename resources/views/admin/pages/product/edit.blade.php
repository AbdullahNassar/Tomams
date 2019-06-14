@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
@foreach($products as $product)
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Products</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Product 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <form action="{{route('admin.product.addImages')}}" style="border: solid 1px; border-color:#000; width: 1050px; height: 300px; margin: 30px; " class="dropzone" id="my-dropzone" method="post">
                                    {{ csrf_field() }}
                                        <p style="text-align: center; font-size: large;">Add New Images</p>
                                        <input type="hidden" name="product_id" value="{{ $product->p_id }}">
                                </form>
                                <div style=" width: 100%; margin-bottom: 100px; margin-top: 60px; margin-left: 30px;">
                                    <div class="col-md-12" style="border: solid 1px; border-color:#fff; width:1050px; height: 100%; padding-left: 35px;">
                                        <p style="margin-left: 420px; font-size: large; margin-bottom: 20px;">Product Images</p>
                                        @foreach($images as $image)
                                        <div class="col-md-2" style="border: solid 1px; border-color:#fff; margin-bottom: 70px; margin: 5px; padding: 5px; margin-bottom: 50px;  margin-left: 20px;">
                                            <ul style="margin-left: 25px; padding: 0;">
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <img style="max-width: 120px; max-height: 70px; margin-bottom: 20px;" src="{{asset($image->image)}}"/>
                                                </li>
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <a class="btn white btn-sm btn-outline sbold uppercase" href="{{ route('admin.product.deleteImg' , ['id' => $image->id]) }}">Delete Image</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12" style="width: 100%; margin-bottom: 20px; margin-top: 20px;">
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    
                                    <form action="{{ route('admin.product.edit' , ['id' => $product->id]) }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" name="s_id" value="{{ $product->p_id }}">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="products" id="storage" >
                                                        <input type="hidden" name="image" value="{{$product->image}}" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('storage/uploads/products').'/'.$product->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn blue btn-sm btn-outline sbold uppercase" type="button" id="upload-btn">
                                                            Upload Image
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Name in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" value="{{ $product->name_ar }}" name="name_ar" class="form-control" placeholder="Product Name in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Name in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" value="{{ $product->name_en }}" name="name_en" class="form-control" placeholder="Product Name in English..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Rate :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <select class="form-control" name="rate" required>
                                                                <option value="{{ $product->rate }}">{{ $product->rate }}</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">On Sale :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="on_sale">
                                                                <option value="{{ $product->on_sale }}">@if($product->on_sale == 1)
                                                                                Yes
                                                                @elseif($product->on_sale == 0)
                                                                                No
                                                                @endif 
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Price :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" value="{{ $product->price }}" name="price" class="form-control" placeholder="Product Price..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Sale Price :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" value="{{ $product->sale_price }}" name="sale_price" class="form-control" placeholder="Product Sale Price..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Description in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="10" name="content_ar" class="form-control" placeholder="Product Description in Arabic...">{{ $product->content_ar }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Description in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="10" name="content_en" class="form-control" placeholder="Product Description in English...">{{ $product->content_en }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Top Rated :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="top_rated">
                                                                <option value="{{ $product->top_rated }}">@if($product->top_rated == 1)
                                                                                Yes
                                                                @elseif($product->top_rated == 0)
                                                                                No
                                                                @endif 
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Latest :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="latest">
                                                                <option value="{{ $product->latest }}">@if($product->latest == 1)
                                                                                Yes
                                                                @elseif($product->latest == 0)
                                                                                No
                                                                @endif 
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Quantity :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control" placeholder="Product Quantity..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Category :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <select class="form-control" name="cat_id" required>
                                                                <option value="{{$product->category_id}}">{{ $product->cat_name_en }}
                                                                </option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->cat_id}}">{{$category->cat_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Sub Category :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <select class="form-control" name="sub_id" required>
                                                                <option value="{{$product->subc_id}}">{{ $product->sub_name_en }}
                                                                </option>
                                                                @foreach($subs as $sub)
                                                                <option value="{{$sub->sub_id}}">{{$sub->sub_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Product Owner :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <select class="form-control" name="owner_id" required>
                                                                <option value="{{$product->owner_id}}">{{ $product->name }}
                                                                </option>
                                                                @foreach($owners as $owner)
                                                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Activation :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="active">
                                                                <option selected value="{{ $product->active }}">@if($product->active == 1)
                                                                                Active
                                                                @elseif($product->active == 0)
                                                                                Not Active
                                                                @endif 
                                                                </option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.products')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                   
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endforeach
@endsection