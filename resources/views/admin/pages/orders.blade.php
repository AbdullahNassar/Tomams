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
                            <li>
                                <span>Messages</span>
                            </li>
                        </ul>
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Messages Table
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                <th>Order Number</th>
                                                <th>Buyer Image</th>
                                                <th>Buyer Name</th>
                                                <th>Phone</th>
                                                <th>Total Price</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$order->id}}
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('storage/uploads/members').'/'.$order->avatar}}" style="max-width: 150px;">
                                                    </td>
                                                    <td>
                                                        {{$order->name}}
                                                    </td>
                                                    <td>
                                                        {{$order->phone}}
                                                    </td>
                                                    <td>
                                                        {{$order->total_price}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--End table-scrollable-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection