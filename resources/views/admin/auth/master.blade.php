<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for " name="description" />
        <meta content="" name="author" />
        <meta name="csrf_token" content="{{csrf_token()}}">

        <!-- Site Title
        ========================== -->
        <title>Login</title>

        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/fav.png')}}">

        <!-- Web Fonts
        ========================== -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 

        <!-- Base & Vendors
        ========================== -->
        <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap-switch.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- THEME GLOBAL STYLES
        ========================== -->
        <link href="{{asset('assets/admin/css/Basic/components.css')}}" id="style_components" rel="stylesheet">
        <link href="{{asset('assets/admin/css/plugin-overwrite/plugins.min.css')}}" rel="stylesheet">
        
        <!-- THEME LAYOUT STYLES
        =============================== -->
        <link href="{{asset('assets/admin/css/layouts&Theme/layout.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/layouts&Theme/blue.min.css')}}" id="style_color" rel="stylesheet">
        <link href="{{asset('assets/admin/css/Basic/custom.css')}}" rel="stylesheet">
        <!-- PAGE LEVEL PLUGINS
        ========================== -->
        <link href="{{asset('assets/admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/vendor/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet">
        <!-- ========================== -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/pages/login.min.css')}}">        

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body class="login">
            @yield('content')


        <!-- BEGIN CORE PLUGINS
            ========================== -->
            <script src="{{asset('assets/admin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
            <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.js')}}"></script>

            <!-- Jquery validation-->
            <script src="{{asset('assets/admin/vendor/jquery-validation/js/jquery.validate.min.js')}}"></script>
            <script src="{{asset('assets/admin/js/login.js')}}"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>