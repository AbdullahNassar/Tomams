<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for form layouts" name="description" />
        <meta content="" name="author" />
        <meta name="csrf_token" content="{{csrf_token()}}">


        <!-- Site Title
        ========================== -->
        <title>Tomams</title>
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/fav.png')}}">
        <!-- Web Fonts
        ========================== -->
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('assets/admin/dropzone.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/admin/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        
        <!-- Glopal Base & Vendors
        ========================== -->
        <link href="{{asset('assets/admin/vendor/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        
        <link href="{{asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet">
        
        <!--Full Calendar-->
        <link href="{{asset('assets/admin/vendor/fullcalendar/fullcalendar.print.min.css')}}" rel="stylesheet" media="print">

        <link href="{{asset('assets/admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
        
        <!-- THEME GLOBAL STYLES
        ========================== -->
        <link href="{{asset('assets/admin/css/Basic/components.css')}}" id="style_components" rel="stylesheet">
        
        <!-- THEME LAYOUT STYLES
        =============================== -->
        <link href="{{asset('assets/admin/css/layouts&Theme/layout.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/layouts&Theme/blue.min.css')}}" id="style_color" rel="stylesheet">
        <link href="{{asset('assets/admin/css/Basic/custom.css')}}" rel="stylesheet">

        <!--Dropzone-->
        <link href="{{asset('assets/admin/dropzone.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/vendor/dropzone/basic.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">

        @include('admin.layouts.header')

        <div class="clearfix"> </div>

            <!-- BEGIN page-container -->
            <div class="page-container">

                

                @include('admin.layouts.sidebar')

                <div class="page-content-wrapper">

                    @yield('content')

                </div>


                @include('admin.layouts.footer')

                @yield('modals')
                @yield('templates')

                <!-- common edit modal with ajax for all project -->
                <div id="common-modal" class="modal fade" role="dialog">
                    <!-- modal -->
                </div>

                <!-- delete with ajax for all project -->
                <div id="delete-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                    </div>
                </div>
                <script id="template-modal" type="text/html" >
                    <div class = "modal-content" >
                        <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                        <div class = "modal-header" >
                            <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                            <h4 class = "modal-title bold" >Delete item?</h4>
                        </div>
                        <div class = "modal-body" >
                            <p >Are you sure?</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "btn btn-danger" >
                                <li class = "fa fa-trash" > </li> Delete
                            </a>

                            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> Cancel</button >
                        </div>
                    </div>
                </script>
                
                @include('admin.templates.alerts')
                @include('admin.templates.delete-modal')

                <form action="#" id="csrf">{!! csrf_field() !!}</form>

            </div><!-- End page-container-->
                
                <!-- BEGIN CORE PLUGINS
                ========================== -->
                <script src="{{asset('assets/admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
                <script src="{{asset('assets/admin/tinymce/js/tinymce/langs/ar.js')}}"></script>
                <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/plugins/jquery-repeater/jquery.repeater.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/dropzone.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/main.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/form-repeater.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/global/scripts/app.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/layouts/layout2/scripts/layout.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/layouts/layout2/scripts/demo.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/process.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/admin/sweetalert.min.js')}}" type="text/javascript"></script>
    </body>
</html>