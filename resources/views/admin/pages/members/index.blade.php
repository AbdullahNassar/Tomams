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
                                <span>Members</span>
                            </li>
                        </ul>
                        <div class="col-md-2" style="float: right; margin-top: 5px;">
                        <div class="btn-group">
                            <a href="{{route('admin.member.add')}}" class="btn green btn-sm btn-outline sbold uppercase">
                                Add New Member
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
                                        <i class="fa fa-gift"></i>Members Table
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
                                                @foreach($members as $member)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$loop->index + 1}}
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('storage/uploads/members').'/'.$member->avatar}}" style="max-width: 150px;">
                                                    </td>
                                                    <td>
                                                        {{$member->name}} 
                                                    </td>
                                                    <td style="max-width: 350px;">
                                                        {{$member->username}} 
                                                    </td>
                                                    <td>
                                                        {{$member->email}} 
                                                    </td>
                                                    <td>
                                                        {{$member->type}} 
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.member.edit' , ['id' => $member->id]) }}" class="btn green"><i class="fa fa-edit"></i> Edit   </a> 
                                                        <button type="button" class="btn btn-danger btndelet" data-url="{{ route('admin.member.delete' , ['id' => $member->id]) }}">
                                                        <i class="fa fa-trash"></i>
                                                            Delete
                                                        </button><br><br>
                                                        {{--active == 0  => not active  --}}
                                                        {{--active == 1  => active  --}}
                                                        @if($member->active == 0)
                                                        <button  data-url="{{route('admin.member.active')}}" data-id="{{$member->id}}" data-token="{{csrf_token()}}" class="btn green approveBTN">
                                                            <li class="fa fa-pencil"> Activate</li>
                                                        </button>
                                                        @else
                                                        <button  data-url="{{route('admin.member.disActive')}}" data-id="{{$member->id}}" data-token="{{csrf_token()}}" class="btn green approveBTN">
                                                            <li class="fa fa-pencil"> DeActivate</li>
                                                        </button>

                                                        @endif
                                                        @if($member->active ==  -1)
                                                        <button  data-url="{{route('admin.member.active')}}" data-token="{{csrf_token()}}" data-id="{{$member->id}}" class="btn btn-danger approveBTN">
                                                            <li class="fa fa-pencil"> UnBlock</li>
                                                        </button>
                                                        @else
                                                        <button  data-url="{{route('admin.member.block')}}" data-token="{{csrf_token()}}" data-id="{{$member->id}}" class="btn btn-danger approveBTN">
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