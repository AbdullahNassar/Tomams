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
                                <span>Users</span>
                            </li>
                        </ul>
                        <div class="col-md-2" style="float: right; margin-top: 5px;">
                        <div class="btn-group">
                            <a href="{{route('admin.user.add')}}" class="btn green btn-sm btn-outline sbold uppercase">
                                Add New User
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- End col -->
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Users Table
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
                                                <th>#</th>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$loop->index + 1}}
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('storage/uploads/users').'/'.$user->image}}" style="max-width: 150px;">
                                                    </td>
                                                    <td>
                                                        {{$user->name}} 
                                                    </td>
                                                    <td style="max-width: 350px;">
                                                        {{$user->username}} 
                                                    </td>
                                                    <td>
                                                        {{$user->email}} 
                                                    </td>
                                                    <td>
                                                        {{$user->type}} 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.user.edit' , ['id' => $user->id]) }}" class="btn green"><i class="fa fa-edit"></i> Edit   </a> 
                                                        <button type="button" class="btn btn-danger btndelet" data-url="{{ route('admin.user.delete' , ['id' => $user->id]) }}">
                                                        <i class="fa fa-trash"></i>
                                                            Delete
                                                        </button><br><br>
                                                        {{--active == 0  => not active  --}}
                                                        {{--active == 1  => active  --}}
                                                        @if($user->active == 0)
                                                        <button  data-url="{{route('admin.user.active')}}" data-id="{{$user->id}}" data-token="{{csrf_token()}}" class="btn green approveBTN">
                                                            <li class="fa fa-pencil"> Activate</li>
                                                        </button>
                                                        @else
                                                        <button  data-url="{{route('admin.user.disActive')}}" data-id="{{$user->id}}" data-token="{{csrf_token()}}" class="btn green approveBTN">
                                                            <li class="fa fa-pencil"> DeActivate</li>
                                                        </button>

                                                        @endif
                                                        @if($user->active ==  -1)
                                                        <button  data-url="{{route('admin.user.active')}}" data-token="{{csrf_token()}}" data-id="{{$user->id}}" class="btn btn-danger approveBTN">
                                                            <li class="fa fa-pencil"> UnBlock</li>
                                                        </button>
                                                        @else
                                                        <button  data-url="{{route('admin.user.block')}}" data-token="{{csrf_token()}}" data-id="{{$user->id}}" class="btn btn-danger approveBTN">
                                                            <li class="fa fa-pencil"> Block</li>
                                                        </button>

                                                        @endif
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