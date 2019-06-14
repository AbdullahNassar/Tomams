@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
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
                                <a href="{{route('admin.products')}}"><span>products</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Add Product Images 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="{{route('admin.product.images')}}" style="border-color:#eee; width: 100%; height: 700px;margin-bottom: 20px;" class="dropzone" id="my-dropzone" method="post">
                                        {{ csrf_field() }}
                                        <div class="col-xs-12">
                                            <div class="col-md-6" style="margin-left: 250px; margin-top: 20px;">
                                                <div class="form-group">
                                                    <p style="text-align: center;">1 : Select Product</p>
                                                    <select class="form-control" required name="product">
                                                        <option>          </option>
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div><!-- End Form-Group -->
                                            </div><!--End Col-md-6-->
                                        </div>
                                        <p style="margin-left: 410px; font-size: large;
                                         color: blue;">2 : Upload Images For Product</p>
                                    </form>
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection