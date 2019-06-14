<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content=""> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf_token" content="{{csrf_token()}}"> 
        
        <!-- Site Title
        ========================== -->
        <title>Tomams</title>
        
        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/Logo.png')}}">

        <!-- Base & Vendors
        ========================== -->
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}">  
        <link rel="stylesheet" href="{{asset('assets/site/vendor/rateit/rateit.css')}}">     
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bxslider/src/css/jquery.bxslider.css')}}">
        
        <!-- Site Style
        ========================== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/test.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        <link href="{{asset('assets/site/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/site/custom.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/dropzone.css')}}" rel="stylesheet" type="text/css" />
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="wrapper">
            @include('site.layouts.header')

            <div class="main" role="main">
            @yield('content')
            @include('site.layouts.footer')
            </div><!--End main-->
        </div><!-- End Wrapper -->
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
                            <h4 class = "modal-title bold" >هل تريد ازالة المنتج ؟</h4>
                        </div>
                        <div class = "modal-body" >
                            <p>سيتم ازالة المنتج من القائمة</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "custom-btn" >
                                <li class = "fa fa-trash" > </li> مسح
                            </a>

                            <button type = "button" class = "custom-btn" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> أغلق</button >
                        </div>
                    </div>
                </script> 
                
                @include('site.templates.alerts')
                @include('site.templates.delete-modal')

                <form action="#" id="csrf">{!! csrf_field() !!}</form>

        <!-- JS Base & Vendors
        ========================== -->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bxslider/src/js/jquery.bxslider.js')}}"></script>
        <script src="{{asset('assets/site/vendor/rateit/jquery.rateit.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/elevatezoom-master/jquery.elevatezoom.js')}}"></script>
        <script src="{{asset('assets/site/vendor/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
        
        <!-- Site JS
        ========================== -->
        <script src="{{asset('assets/site/dropzone.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/upload.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.validate.js')}}" ></script>
        <script src="{{asset('assets/site/sweetalert.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/add.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/recover.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/pay.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/process.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
        (function(){ var widget_id = 'HPFyzs7x04';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
        <!-- {/literal} END JIVOSITE CODE -->

    </body>
</html>