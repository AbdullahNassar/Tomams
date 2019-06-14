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
                                <span>Send Mail</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Send Mail 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="{{route('sendAll')}}" class="form-horizontal" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <label class="control-label" style="margin-left: 420px; font-size: larger; margin-bottom: 20px;">
                                                    All Subscribers</label>
                                                <div class="form-group">
                                                    @foreach($subscribers as $subscriber)
                                                    <div class="col-md-4">
                                                        <div class="input-group" style="margin-bottom: 15px;">
                                                            <span class="input-group-addon ">
                                                                <i class="fa fa-user"></i>
                                                            </span>
                                                            <input type="text" class="form-control" value="{{$subscriber->email}}" readonly >
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div><hr>
                                            <div class="col-md-12" style="margin-bottom: 50px; padding-left: 30px; padding-right: 30px;">
                                                <label class="control-label" style="margin-left: 430px; font-size: larger; margin-bottom: 20px;">
                                                    Message</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-microphone"></i>
                                                        </span>
                                                        <textarea rows="30" class="form-control" name="content"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-7">
                                                        <button type="submit" class="btn green addBTN">Send</button>
                                                        <a href="{{route('admin.subscribers')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                    </div>
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