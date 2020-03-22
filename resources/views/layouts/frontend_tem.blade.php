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
	<link href="{{asset('home/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('home/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('home/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('home/css/forum/style.min.css')}}" rel="stylesheet" />
	<link href="{{asset('home/css/forum/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('home/css/forum/theme/default.css')}}" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
    {{-- Include Frontend css--}}
    <link rel="stylesheet" href="{{asset('frontend/rekomendasi.css')}}">
    {{-- End --}}
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('home/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}" class="navbar-brand">
                    <span class="navbar-logo"></span>
                    <span class="brand-text">
                        Papi Kos
                    </span>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- begin #header-navbar -->
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                       <li> 
                           <a href="{{url('/dashboard')}}">{{auth::user()->name}}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="feather icon-log-out"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li><a href="{{route('register')}}" style="font-weight:bold">Buat Akun</a></li>
                        @endif
                            <li><a href="{{route('login')}}" style="font-weight:bold">Masuk</a></li>
                    @endauth
                </ul>
            </div>
            <!-- end #header-navbar -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #header -->
    
    <!-- begin search-banner -->
    {{-- <div class="search-banner has-bg"> --}}
        @yield('header')
    {{-- </div> --}}
    <!-- end search-banner -->
    
    <!-- begin content -->
    <div class="content">
        <!-- begin container -->
        @yield('content')
        <!-- end container -->
    </div>
    <!-- end content -->
    
    <!-- begin #footer -->
    <div id="footer" class="footer">
        <!-- begin container -->
        @yield('footer')
        <!-- end container -->
    </div>
    <!-- end #footer -->
    <!-- begin #footer-copyright -->
    <div id="footer-copyright" class="footer-copyright">
        <div class="container">
            &copy; 2020 Dibuat Dengan <img src="{{asset('backend/img/icon/love.gif')}}" height="30" width="30"> - <a href="https://twitter.com/andri_desmana" style="float: unset; text-decoration:none">Andri Desmana</a>
        </div>
    </div>
    <!-- end #footer-copyright -->	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('home/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('home/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('home/plugins/js-cookie/js.cookie.js')}}"></script>
	<script src="{{asset('home/js/forum/apps.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>    
	    $(document).ready(function() {
	        App.init();
	    });
    </script>
    @yield('script')
</body>
</html>
