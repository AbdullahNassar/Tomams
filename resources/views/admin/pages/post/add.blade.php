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
                                <span>Posts</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Add New Post 
                                    </div>
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="{{route('admin.post.add')}}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="posts" id="storage" >
                                                        <input type="hidden" name="image" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <p style="font-size: large;">Choose Image</p>
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
                                            <div class="col-md-12" style="margin-bottom: 50px;">
                                            <div class="form-group" style="margin-left: 250px;">
                                                <label class="col-md-2 control-label">Activation :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="active">
                                                                <option>Select Status...</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Titel in Arabic :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="title_ar" class="form-control" placeholder="Post Titel..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Titel in English :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="title_en" class="form-control" placeholder="Post Titel..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Header in Arabic:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="head_ar" class="form-control" placeholder="Post Header..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Header in English:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="head_en" class="form-control" placeholder="Post Header..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Content in Arabic:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <textarea rows="10" name="content_ar" class="form-control " placeholder="Post Content..."></textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Content in English:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <textarea rows="10" name="content_en" class="form-control " placeholder="Post Content..."></textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 20px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Post Date:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="date" name="created_at" class="form-control" placeholder="Post Date..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 50px;">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Admin :</label>
                                                <div class="col-md-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="user_id">
                                                                <option>Select Admin...</option>
                                                                @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                @endforeach
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
                                                    <a href="{{route('admin.posts')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
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
@endsection