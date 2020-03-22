<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('backend/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('backend/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url({{asset('backend/img/login-bg/login-bg-12.jpg')}})" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        @yield('auth')
        <!-- end login -->
        
        <ul class="login-bg-list clearfix">
            <li><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-17.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-17.jpg')}})"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-16.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-16.jpg')}})"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-15.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-15.jpg')}})"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-14.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-14.jpg')}})"></a></li>
            <li><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-13.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-13.jpg')}})"></a></li>
            <li class="active"><a href="javascript:;" data-click="change-bg" data-img="{{asset(
                'backend/img/login-bg/login-bg-12.jpg')}}" style="background-image: url({{asset(
                'backend/img/login-bg/login-bg-12.jpg')}})"></a></li>
        </ul>
        
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('backend/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('backend/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('backend/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('backend/js/theme/default.min.js')}}"></script>
	<script src="{{asset('backend/js/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset('backend/js/demo/login-v2.demo.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
    </script>
    @yield('script')
</body>
</html>
