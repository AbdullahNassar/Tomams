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
                                <span>Ads</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Ad 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @foreach($ads as $ad)
                                    <form action="{{ route('admin.ad.edit' , ['id' => $ad->id]) }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <label class="col-md-12 control-label" style="margin-left: 420px; font-size: larger; margin-top: 22px;">Upload Ad Image</label>
                                                <div class="form-group" style="margin-top: 50px;">
                                                    <div class="choose-img">
                                                        <input type="hidden" name="s_id" value="{{ $ad->id }}">
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="ads" id="storage" >
                                                        <input type="hidden" name="image" value="{{$ad->image}}" id="img" >
                                                        <input type="file" name="image" id="image">
                                                        <img src="{{asset('assets/site/images/banners').'/'.$ad->image}}"/>
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
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-5 col-md-7">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.ads')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection