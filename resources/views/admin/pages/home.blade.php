@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('assets/site/images/logo.png')}}" style="max-width: 100%; margin-left: 300px; margin-top: 100px;" /> 
                        </div><!--End Col-md--12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection