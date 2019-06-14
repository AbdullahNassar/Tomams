<!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo" style="background-color: #eef1f5;">
                        <a href="{{route('admin.home')}}" style="margin-top: 12px; margin-left: 40px; margin-bottom: 15px;"><img src="{{asset('assets/admin/images/logo.png')}}" alt="" style="max-width: 70px;" />
                        </a> 
                    <!--<div class="menu-toggler sidebar-toggler">
                    </div>-->
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->

                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!--<li class="dropdown dropdown-extended dropdown-inbox">
                                <a href="{{route('admin.message')}}" class="dropdown-toggle">
                                    <i class="icon-envelope-open"></i>
                                </a>
                            </li>-->
                            
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    @if(count(Auth::guard('admins')->user()->unreadNotifications))
                                    <span class="badge badge-default"> {{count(Auth::guard('admins')->user()->unreadNotifications)}} </span> @endif
                                </a>
                                <ul class="dropdown-menu">
                                    <li style="text-align: center;">
                                        <a class="from" href="{{route('markAsRead')}}" style="color: #5b9bd1;">Mark all As Read</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            @foreach(Auth::guard('admins')->user()->unreadNotifications as $notification)
                                            <li>
                                                <a href="{{route('admin.message')}}">
                                                    <span class="photo">
                                                        <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> {{Auth::guard('admins')->user()->name}} </span>
                                                        <span class="time icon-envelope"></span>
                                                    </span>
                                                    <span class="message"> @include('admin.layouts.partials.notifications.'.snake_case(class_basename($notification->type)))</span>
                                                </a>
                                            </li>
                                            @endforeach
                                            
                                            @foreach(Auth::guard('admins')->user()->readNotifications as $notification)
                                            <li>
                                                <a href="{{route('admin.message')}}">
                                                    <span class="photo">
                                                        <img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from"> {{Auth::guard('admins')->user()->name}} </span>
                                                        <span class="time icon-envelope-open"></span>
                                                    </span>
                                                    <span class="message"> @include('admin.layouts.partials.notifications.'.snake_case(class_basename($notification->type)))</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" />
                                    
                                    <span class="username username-hide-on-mobile">{{Auth::guard('admins')->user()->name}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
